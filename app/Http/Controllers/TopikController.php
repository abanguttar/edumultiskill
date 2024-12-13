<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTopikRequest;
use App\Http\Requests\UpdateTopikRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TopikController extends Controller
{

    protected $topik;

    public function __construct()
    {
        $this->topik = new Topik();
        parent::__construct();
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id, $jadwal_id): JsonResponse
    {

        $validator = Validator::make([
            'nama_topik' => $request->input('nama_topik'),
            'durasi' => $request->input('durasi'),
        ], [
            'nama_topik' => 'required|max:50',
            'durasi' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400));
        }
        $data = $validator->validated();

        $count_urutan = $this->topik::where('jadwal_id', $jadwal_id)->count('urutan');

        $data['kelas_id'] = $id;
        $data['jadwal_id'] = $jadwal_id;
        $data['urutan'] = ++$count_urutan;
        $datas = array_merge($data, $this->userCreateUpdate);

        $this->topik::create($datas);
        $this->flashSuccessCreate($request);

        return response()->json([
            'success' => true,
            'message' => 'ok',
            'datas' => $datas
        ], 200);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, $jadwal_id, $topik_id): JsonResponse
    {
        $validator = Validator::make([
            'nama_topik' => $request->input('nama_topik'),
            'durasi' => $request->input('durasi'),
        ], [
            'nama_topik' => 'required|max:50',
            'durasi' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400));
        }
        $data = $validator->validated();
        $datas = array_merge($data, $this->userUpdate);

        $this->topik::findOrFail($topik_id)->update($datas);

        return response()->json([
            'success' => true,
            'message' => 'ok',
            'datas' => $datas
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function up(Request $request, $id, $jadwal_id, $topik_id): JsonResponse
    {

        try {
            DB::beginTransaction();
            $topik = $this->topik::findOrFail($topik_id);
            $current_urutan = $topik->urutan;
            $expectation_urutan = --$topik->urutan;
            $other_topik = $this->topik::where('jadwal_id', $jadwal_id)->where('urutan', $expectation_urutan)->first();
            $data = ['urutan' => $expectation_urutan];
            $datas = array_merge($data, $this->userUpdate);
            $other_data = ['urutan' => $current_urutan];
            $other_datas = array_merge($other_data, $this->userUpdate);

            $topik->update($datas);
            $other_topik->update($other_datas);

            DB::commit();
            $this->flashSuccessUpdate($request);
            return response()->json([
                'success' => true,
                'message' => 'ok',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $th->getMessage()
            ], 400));
        }
    }

    public function down(Request $request, $id, $jadwal_id, $topik_id): JsonResponse
    {

        try {
            DB::beginTransaction();
            $topik = $this->topik::findOrFail($topik_id);
            $current_urutan = $topik->urutan;
            $expectation_urutan = ++$topik->urutan;
            $other_topik = $this->topik::where('jadwal_id', $jadwal_id)->where('urutan', $expectation_urutan)->first();
            $data = ['urutan' => $expectation_urutan];
            $datas = array_merge($data, $this->userUpdate);
            $other_data = ['urutan' => $current_urutan];
            $other_datas = array_merge($other_data, $this->userUpdate);

            $topik->update($datas);
            $other_topik->update($other_datas);

            DB::commit();
            $this->flashSuccessUpdate($request);
            return response()->json([
                'success' => true,
                'message' => 'ok',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $th->getMessage()
            ], 400));
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topik $topik)
    {
        //
    }
}
