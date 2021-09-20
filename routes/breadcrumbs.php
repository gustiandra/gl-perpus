<?php

// Dashboard

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});


// Rack
Breadcrumbs::for('admin.rack.index', function ($trail) {
    $trail->push('Rak', route('admin.rack.index'));
});

// Category
Breadcrumbs::for('admin.category.index', function ($trail) {
    $trail->push('Kategori', route('admin.category.index'));
});

// Book
Breadcrumbs::for('admin.book.index', function ($trail) {
    $trail->push('Buku', route('admin.book.index'));
});
Breadcrumbs::for('admin.book.create', function ($trail) {
    $trail->push('Buku', route('admin.book.index'));
    $trail->push('Tambah Buku', route('admin.book.create'));
});
Breadcrumbs::for('admin.book.edit', function ($trail, $book) {
    $trail->push('Buku', route('admin.book.index'));
    $trail->push('Ubah Buku', route('admin.book.edit', $book));
});
Breadcrumbs::for('admin.book.show', function ($trail, $book) {
    $trail->push('Buku', route('admin.book.index'));
    $trail->push($book->title, route('admin.book.show', $book));
});

// Author Edit
// Breadcrumbs::for('admin.author.edit', function ($trail, $author) {
//     $trail->push('Beranda', route('admin.dashboard'));
//     $trail->push('Penulis', route('admin.author.index'));
//     $trail->push('Ubah Data Penulis', route('admin.author.edit', $author));
// });