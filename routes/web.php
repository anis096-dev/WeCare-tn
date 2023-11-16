<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Contact;
use App\Models\Specialty;
use App\Models\Treatment;
use App\Models\Permission;
use App\Models\Appointment;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Role\RoleIndex;
use App\Http\Livewire\Admin\User\UserIndex;
use App\Http\Livewire\Admin\Admin\AdminIndex;
use App\Http\Livewire\Guest\About\AboutIndex;
use App\Http\Livewire\Admin\Contact\ContactIndex;
use App\Http\Livewire\Guest\Contact\ContactCreate;
use App\Http\Livewire\Admin\Specialty\SpecialtyIndex;
use App\Http\Livewire\Admin\Treatment\TreatmentIndex;
use App\Http\Livewire\Admin\Permission\PermissionIndex;
use App\Http\Livewire\Admin\Appointment\AppointmentIndex;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/fortify.php';


Route::get('/', function () { return view('welcome');})->name('home');
Route::get('/contact-us',ContactCreate::class)->name('contact.create');
Route::get('/about-us',AboutIndex::class)->name('about.index');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'registration_completed'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/',AdminIndex::class)->name('index');
    Route::get('/users',UserIndex::class)->name('user.index')->can('viewAny', User::class);
    Route::get('/roles',RoleIndex::class)->name('role.index')->can('viewAny', Role::class);
    Route::get('/permissions',PermissionIndex::class)->name('permission.index')->can('viewAny', Permission::class);
    Route::get('/specialties',SpecialtyIndex::class)->name('specialty.index')->can('viewAny', Specialty::class);
    Route::get('/treatments',TreatmentIndex::class)->name('treatment.index')->can('viewAny', Treatment::class);
    Route::get('/contacts',ContactIndex::class)->name('contact.index')->can('viewAny', Contact::class);
    Route::get('/appointments',AppointmentIndex::class)->name('appointment.index')->can('viewAny', Appointment::class);
});