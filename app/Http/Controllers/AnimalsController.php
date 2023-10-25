<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    private $animals = ['ikan','ayam', 'kucing'];

    public function index()
    {
        // Menggunakan foreach untuk menampilkan data array
        foreach ($this->animals as $animal) {
            echo $animal . ',';
        }
    }

    public function store(Request $request)
    {
        // Memasukkan data ke array
        $newAnimal = $request->input('animal');
        array_push($this->animals, $newAnimal);

        // Menampilkan data array yang sudah di-store
        $this->index();
    }

    public function update(Request $request, $id)
    {
        // Memperbarui data array
        $updatedAnimal = $request->input('animal');
        $this->animals[$id] = $updatedAnimal;

        // Menampilkan data yang sudah di-update
        $this->index();
    }

    public function destroy($id)
    {
        // Menghapus data dari array
        unset($this->animals[$id]);

        // Menampilkan data yang tersisa
        $this->index();
    }
}
// masih bingung kak kenapa saat menampilkan data yang sudah di store data yang kita tambahkan tidak muncul/null hanya 
// menambahkan jumlah arraynya yang sebelumnya 3 menjadi 4 begitu juga dengan methode update data yang diupdate menjadi null 
