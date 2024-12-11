<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\FAQContent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFAQRequest;
use Illuminate\Mail\Mailables\Content;
use App\Http\Requests\UpdateFAQRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class FAQController extends Controller
{

    protected $path = 'admin/faq';
    protected $faq;
    protected $faq_content;


    public function __construct()
    {
        parent::__construct();
        $this->faq = FAQ::class;
        $this->faq_content = FAQContent::class;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'FAQ';
        $data_nav  = ['cms', 'faq'];
        $faqs = $this->faq::with('user')->get();
        return view("$this->path/index", compact('title', 'faqs', 'data_nav'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create New FAQ';
        $data_nav  = ['cms', 'faq'];
        return view("$this->path/create", compact('title',  'data_nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFAQRequest $request)
    {
        $data = $request->validated();
        $datas = array_merge($data, $this->userCreateUpdate);
        $datas['title'] = ucwords($data['title']);
        $datas['slug'] =  Str::slug($datas['title']);
        $this->faq::create($datas);
        $this->flashSuccessCreate($request);
        return redirect()->route('list-faq');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit FAQ';
        $data_nav  = ['cms', 'faq'];
        $faq = $this->faq::find($id);
        $faq_contents = $this->faq_content::where('faq_id', $id)->get();

        return view("$this->path/edit", compact('title',  'data_nav', 'faq', 'faq_contents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFAQRequest $request, $id)
    {
        $data = $request->validated();
        $datas = array_merge($data, $this->userUpdate);
        $datas['title'] = ucwords($data['title']);
        $datas['slug'] =  Str::slug($datas['title']);
        $is_slug_exists = $this->faq::whereNot('id', $id)->where('slug', $datas['slug'])->count();
        if ($is_slug_exists !== 0) {
            throw ValidationException::withMessages(['title' => "Title already exists!"]);
            return redirect()->back()->withInput();
        }

        $this->faq::findOrFail($id)->update($datas);
        $this->flashSuccessUpdate($request);
        return redirect()->route('edit-faq', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $fAQ)
    {
        //
    }



    public function storeContent(Request  $request): JsonResponse
    {

        $validator = Validator::make([
            'title_content' => $request->input('title_content'),
            'content' => $request->input('content'),
            'faq_id' => $request->input('faq_id'),
        ], [
            'title_content' => 'required|max:100',
            'content' => 'required',
            'faq_id' => 'required|numeric',
        ]);




        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400));
        }

        $data = $validator->validated();
        $datas = array_merge($data, $this->userCreateUpdate);

        // Insert faq datas
        $this->faq_content::create($datas);
        $this->faq::findOrFail($datas['faq_id'])->update(['user_update' => Auth::user()->id]);
        $this->flashSuccessCreate($request);
        return response()->json([
            'success' => true,
            'message' => 'ok',
        ], 200);
    }
    public function updateContent(Request $request, $id): JsonResponse
    {

        $validator = Validator::make([
            'title_content' => $request->input('title_content'),
            'content' => $request->input('content'),
            'faq_id' => $request->input('faq_id'),
        ], [
            'title_content' => 'required|max:100',
            'content' => 'required',
            'faq_id' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400));
        }
        $data = $validator->validated();
        $datas = array_merge($data, $this->userCreateUpdate);


        // Insert faq datas
        $this->faq_content::findOrFail($id)->update($datas);
        $this->faq::findOrFail($datas['faq_id'])->update(['user_update' => Auth::user()->id]);
        $this->flashSuccessUpdate($request);
        return response()->json([
            'success' => true,
            'message' => 'ok',
        ], 200);
    }

    public function destroyContent(Request $request, $id): JsonResponse
    {

        $validator = Validator::make([
            'faq_id' => $request->input('faq_id'),
        ], [
            'faq_id' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400));
        }
        $data = $validator->validated();

        // Remove faq datas
        $this->faq_content::findOrFail($id)->delete();
        $this->faq::findOrFail($data['faq_id'])->update(['user_update' => Auth::user()->id]);
        $this->flashSuccessUpdate($request, 'Berhasil menghapus data!');
        return response()->json([
            'success' => true,
            'message' => 'ok',
        ], 200);
    }
}
