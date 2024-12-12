<?php

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\View;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('view', 'pdf-example');

Route::get('/pdf', function () {
//    Browsershot::html('<h1>سلام داش حسین</h1>
//<p>به کمک لاراول و Spatie PDF می‌توانیم به راحتی PDF تولید کنیم.</p>')
//        ->setChromePath('C:/Win_x64_1310011_chrome-win/chrome-win/chrome.exe') // مسیر Chrome دانلود شده
//        ->noSandbox() // اختیاری
//        ->save(public_path('example.pdf'));
    $html = View::make('pdf-example')->render(); // فایل Blade را رندر کنید
//
    $pdfContent = Browsershot::html($html)
        ->setChromePath('/root/.cache/puppeteer/chrome/linux-131.0.6778.87/chrome-linux64/chrome')
        ->noSandbox()
        ->timeout(120)
        ->emulateMedia('print')
        ->showBackground()
        ->pdf();

    return response($pdfContent)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="contract.pdf"');

//    Browsershot::html('<h1>Hello World!</h1>')
//        ->setChromePath('C:/Win_x64_1310011_chrome-win/chrome-win/chrome.exe') // مسیر دقیق Chrome
//        ->noSandbox() // تنظیمات برای جلوگیری از مشکلات دسترسی
//        ->timeout(120) // افزایش زمان انتظار به 120 ثانیه
//        ->save(public_path('example.pdf')); // ذخیره فایل در پوشه public
});
