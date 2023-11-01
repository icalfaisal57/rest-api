<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model{
    # menambahkan property fillable
    protected $fillable = ['nama', 'nim', 'email', 'jurusan'];
    # membuat fungsi getStudents di model Student
    # menggunakan query untuk mengambil data
    public function getStudents(){
    $students = Student::all();
    return $students;}
}