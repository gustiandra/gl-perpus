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

// Member
Breadcrumbs::for('admin.member.verif.index', function ($trail) {
    $trail->push('Verifikasi Member', route('admin.member.verif.index'));
});
Breadcrumbs::for('admin.member.verif.show', function ($trail, $user) {
    $trail->push('Verifikasi Member', route('admin.member.verif.index'));
    $trail->push($user->name, route('admin.member.verif.show', $user));
});
Breadcrumbs::for('admin.member.index', function ($trail) {
    $trail->push('Member', route('admin.member.index'));
});
Breadcrumbs::for('admin.member.create', function ($trail) {
    $trail->push('Member', route('admin.member.index'));
    $trail->push('Tambah Member', route('admin.member.create'));
});
Breadcrumbs::for('admin.member.edit', function ($trail, $user) {
    $trail->push('Member', route('admin.member.index'));
    $trail->push('Ubah Member', route('admin.member.edit', $user));
});
Breadcrumbs::for('admin.member.show', function ($trail, $member) {
    $trail->push('Member', route('admin.member.index'));
    $trail->push('Ubah Member', route('admin.member.show', $member));
});
Breadcrumbs::for('admin.member.blocked.index', function ($trail) {
    $trail->push('Member Diblokir', route('admin.member.blocked.index'));
});



// Borrow
Breadcrumbs::for('admin.borrow.verif.index', function ($trail) {
    $trail->push('Verifikasi Peminjaman', route('admin.borrow.verif.index'));
});
Breadcrumbs::for('admin.borrow.index', function ($trail) {
    $trail->push('Buku Dipinjam', route('admin.borrow.index'));
});








// ======================================== Member =======================================

// Dashboard
Breadcrumbs::for('member.dashboard', function ($trail) {
    $trail->push('Dashboard', route('member.dashboard'));
});

// Profile
Breadcrumbs::for('member.profile', function ($trail) {
    $trail->push('Profil', route('member.profile'));
});
