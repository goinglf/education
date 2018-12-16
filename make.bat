@echo off 
php artisan make:controller Admin/LessonController
php artisan make:controller Admin/CourseController
php artisan make:model Admin/Lesson
php artisan make:model Admin/Course
pause: