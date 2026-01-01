..........Setup Project.............

Terminal:
cd /path/to/laragon/www/
mkdir BlogAssignment
cd BlogAssignment
<img width="542" height="310" alt="terminal" src="https://github.com/user-attachments/assets/e6808e4e-30a5-4471-be4b-08402a782658" />

.......... Paste all your project files here..................
composer install
copy .env.example .env
php artisan key:generate
php artisan jwt:secret

..........Setup Database...........

Create database
Update .env file - Change these lines:
DB_DATABASE=BlogAssignment
DB_USERNAME=root
DB_PASSWORD=

    Run Setup Commands
Terminal:
php artisan migrate

.........Create admin user...............
Terminal:
php artisan tinker
In Tinker:
App\Models\User::create([
    'name' => 'Admin',
    'email' => 'philipsuccess101@gmail.com',
    'password' => bcrypt('password123')
]);
exit

............Start Server................
Terminal:
php artisan serve
Open: http://localhost:8000

                        JWT Authentication APIs
cmd
:: 1. GET TOKEN
curl -X POST http://localhost:8000/api/auth/login ^
  -H "Content-Type: application/json" ^
  -d "{\"email\":\"admin@blog.com\",\"password\":\"password123\"}"

:: 2. TEST PROFILE (Replace YOUR_TOKEN)
curl -X GET http://localhost:8000/api/auth/profile ^
  -H "Authorization: Bearer YOUR_TOKEN"

:: 3. LOGOUT
curl -X POST http://localhost:8000/api/auth/logout ^
  -H "Authorization: Bearer YOUR_TOKEN"
Public APIs (No Token)
cmd
:: 4. GET ALL POSTS
curl http://localhost:8000/api/posts

:: 5. SUBMIT COMMENT
curl -X POST http://localhost:8000/api/posts/test-post-slug/comments ^
  -H "Content-Type: application/json" ^
  -d "{\"author\":\"John Doe\",\"content\":\"Great article!\"}"
<img width="723" height="350" alt="token response" src="https://github.com/user-attachments/assets/cb3c733f-024c-4317-9a8b-747037e2bde9" />

.................. WEB PAGES...................
Page	           URL	
Homepage	http://localhost:8000,
Admin Login	http://localhost:8000/login,	
Admin Posts	http://localhost:8000/admin/posts,	
Create Post	http://localhost:8000/admin/posts/create,	
View Post	http://localhost:8000/post/{slug},

Admin Login:
Email: philipsuccess101@gmail.com,
Password: password123

.................SCREENSHOTS.......................

Screenshots are saved in the screenshot folder

All blogs.png - Public blog listing,
Admin login.png - Admin login screen,
admin dashboard.png - Posts management,
createpost.png - Create post form,
token response.png - JWT token response,
api posts.png - Posts API response,
Login DB.png,
Post DB.png

