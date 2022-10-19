<!DOCTYPE html>
<html>

    <body background="https://www.google.com/imgres?imgurl=https%3A%2F%2Fmedia.istockphoto.com%2Fphotos%2Fforest-wooden-table-background-summer-sunny-meadow-with-green-grass-picture-id1353553203%3Fb%3D1%26k%3D20%26m%3D1353553203%26s%3D170667a%26w%3D0%26h%3DQTyTGI9tWQluIlkmwW0s7Q4z7R_IT8egpzzHjW3cSas%3D&imgrefurl=https%3A%2F%2Funsplash.com%2Fbackgrounds&tbnid=mQaAYM144aE0vM&vet=12ahUKEwj8qP3Cv-r6AhVx7zgGHa7GBlwQMygCegUIARDpAQ..i&docid=b6YOYbz4PifiGM&w=511&h=337&itg=1&q=background%20image&ved=2ahUKEwj8qP3Cv-r6AhVx7zgGHa7GBlwQMygCegUIARDpAQ">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        
        </div>
        <h3 align="center">
		<font face="Lato" size="6">LOGO</font>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	</h3>
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<h1 align="center">
		<font face="Lato" color="#017bf5" size="7">
			BEAUTIFUL AND SIMPLE WEB PAGE
		</font>
	</h1>
	<h3 align="center">
		<font face="Lato" color="#000" size="5">
			USING HTML ONLY (NO CSS USED)
		</font>
	</h3>
	<br />
	<h3 align="center">
	<a href="#">
		<font face="Lato" color="#000">GET STARTED</font>
	</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="#">
		<font face="Lato" color="#fff">SUBSCRIBE US</font>
	</a>
	</h3>
        </body>
        </html>

            