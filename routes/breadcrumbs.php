<?php

// Dashboard
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

// Author Edit
// Breadcrumbs::for('admin.author.edit', function ($trail, $author) {
//     $trail->push('Beranda', route('admin.dashboard'));
//     $trail->push('Penulis', route('admin.author.index'));
//     $trail->push('Ubah Data Penulis', route('admin.author.edit', $author));
// });