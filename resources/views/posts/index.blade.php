@extends('layouts.app')

@section('title', 'Data Posts')

@section('header-title', 'Data Posts')

@section('content')
<style>
    .pagination svg {
        width: 1em; /* Mengatur lebar ikon */
        height: 1em; /* Mengatur tinggi ikon */
    }
 </style>
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title text-primary">Data Posts</h5>
                <a href="{{ route('posts.add')}}" class="btn btn-success">TAMBAH POST</a>
                <a href="{{ route('posts.pdf')}}" class="btn btn-primary">generate PDF</a>
            </div>
            <table class="table table-striped table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">GAMBAR</th>
                        <th scope="col">JUDUL</th>
                        <th scope="col">CONTENT</th>
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                    <td class="text-center">
                            <img src="{{ asset('images/254721151_utb_kotak.png') }}" class="rounded" style="width: 150px" alt="Post Image">
                        </td>
                        <td>Universitas Teknologi Bandung</td>
                        <td>Sekolah Tinggi Teknologi Bandung (STTB) berdiri sejak 1991, dan pada Maret 2024 Sekolah Tinggi Teknologi Bandung berubah bentuk menjadi Universitas Teknologi Bandung. </td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                                <a href="" class="btn btn-dark btn-sm">SHOW</a>
                                <a href="" class="btn btn-primary btn-sm">EDIT</a>
                                <button type="submit" class="btn btn-danger btn-sm">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-center">
                            <div class="alert alert-danger">
                                Data Post belum Tersedia.
                            </div>
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
     </div>
@endsection
