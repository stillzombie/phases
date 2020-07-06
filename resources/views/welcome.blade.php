@extends('layouts.app')
@section('content')


<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8"
 style="background-color: #00dfea;
background-image: url(&quot;data:image/svg+xml,%3Csvg width='32' height='64' viewBox='0 0 32 64' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 28h20V16h-4v8H4V4h28v28h-4V8H8v12h4v-8h12v20H0v-4zm12 8h20v4H16v24H0v-4h12V36zm16 12h-4v12h8v4H20V44h12v12h-4v-8zM0 36h8v20H0v-4h4V40H0v-4z' fill='%2309bac3' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E&quot;);"
  >
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <img class="mx-auto h-12 w-auto" src="{{ asset('img/logo.png') }}" alt="Workflow" />

  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-black py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form action="#" method="POST">
        <div>
          <label for="email" class="block text-sm font-medium leading-5 text-white">
            Email address
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-blue-500 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
          </div>
        </div>

        <div class="mt-6">
          <label for="password" class="block text-sm font-medium leading-5 text-white">
            Password
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
          </div>
        </div>

        <div class="mt-6">
          <span class="block w-full rounded-md shadow-sm">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-msblue-300 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
              Sign in
            </button>
          </span>
        </div>
      </form>

    </div>
  </div>
</div>


@endsection