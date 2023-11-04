<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $input = [
        //     'nama'=>$request->nama,
        //     'nim'=>$request->nim,
        //     'email'=>$request->email,
        //     'jurusan'=>$request->jurusan,
        // ];
        #menggunakan model student untuk insert data
        $student = Student::create($request->all());

		$result = [
			'message' => 'Data Student Berhasil Dibuat',
			'data' => $student,
		];

		return response()->json($result, 201);
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
