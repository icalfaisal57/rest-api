<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        #memanggil method getallstudents
        #dari model student
        $students = Student::all();
        $data=[
            'message'=> 'get all students',
            'data'=> $students        
        ];
        return response()->json($data,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function sort(Request $request)
    {
        $filter = $request->input('filter_by');//menangkap filter kolom yang diinginkan
        $default = "asc"; //untuk mengatur default value di sort agar menjadi ascending
        $sort = $request->input('sort_by')??$default;//menangkap asc atau desc

        $students = Student::orderBy("$filter", "$sort")->get();
        $data=[
            'message'=> 'get students',
            'data'=> $students        
        ];
        return response()->json($data, 201);
        // view('data.index', compact('filteredData'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        // $input = [
        //     'nama'=>$request->nama,
        //     'nim'=>$request->nim,
        //     'email'=>$request->email,
        //     'jurusan'=>$request->jurusan,
        // ];
        #menggunakan model student untuk insert data
            // dd($request->all());

        $student = Student::create($request->all());

		$result = [
			'message' => 'Data Student Berhasil Dibuat',
			'data' => $student,
		];

		return response()->json($result, 201);
        //saat validasi ketika memasukan data yang tidak sesuai validasi saat di postman otomatis akan kembali ke homepage / jika di dokumentasi 
        //laravel akan kembali ke halaman sebelumnya yaitu halaman homepage laravel, karena itu saya memvalidasi dan menulis eror message di student request
    }   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        {
            $student = Student::find($id);
    
            if ($student) {
                $response = [
                    'message' => 'Get detail student',
                    'data' => $student
                ];
        
                return response()->json($response, 200);
            } else {
                $response = [
                    'message' => 'Data not found'
                ];
                
                return response()->json($response, 404);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
		if ($student) {
			$data = [
				'message' => 'Student is updated',
				'data' => $student
			];
	
			return response()->json($data, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //mencari menggunakan method find lalu melakukan pengkondisian dengan if jika data tersebut ada
        // atau tidak ada lalu disimpan dalam variabel
        $student = Student::find($id);
        $student->delete();
		if ($student) {
			$response = [
				'message' => 'Student is delete',
				'data' => $student
			];

			return response()->json($response, 200); 
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
    }
}
