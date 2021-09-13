<?php
// Home
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Author Edit
// Breadcrumbs::for('admin.author.edit', function ($trail, $author) {
//     $trail->push('Beranda', route('admin.dashboard'));
//     $trail->push('Penulis', route('admin.author.index'));
//     $trail->push('Ubah Data Penulis', route('admin.author.edit', $author));
// });