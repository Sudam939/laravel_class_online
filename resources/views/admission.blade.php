<x-frontend-layout>

    <section>
        <div class="container m-auto">
            <h3 class="text-2xl text-center pb-5">Admission</h3>
            <form action="{{ route('store-admission') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="w-full rounded-md">
                        @error('name')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" class="w-full rounded-md">
                        @error('phone')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="w-full rounded-md">
                        @error('email')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="w-full rounded-md">
                        @error('address')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="course">Select Course</label>
                        <select name="course" id="course" class="w-full rounded-md">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>



    <section class="py-10 bg-gray-100">
        <div class="container">
            <h1 class="text-2xl text-center font-semibold pb-5">Courses</h1>

            <table class="w-full text-center border-2 border-gray-700">
                <thead>
                    <tr>
                        <th class="border border-gray-500 p-2">SN</th>
                        <th class="border border-gray-500 p-2">Name</th>
                        <th class="border border-gray-500 p-2">Email</th>
                        <th class="border border-gray-500 p-2">Phone</th>
                        <th class="border border-gray-500 p-2">Address</th>
                        <th class="border border-gray-500 p-2">Course</th>
                        <th class="border border-gray-500 p-2">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($admissions as $index => $admission)
                        <tr>
                            <td class="border border-gray-500 p-2">
                                {{ ++$index }}
                            </td>
                            <td class="border border-gray-500 p-2">
                                {{ $admission->name }}
                            </td>
                            <td class="border border-gray-500 p-2">
                                {{ $admission->email }}
                            </td>
                            <td class="border border-gray-500 p-2">
                                {{ $admission->phone }}
                            </td>
                            <td class="border border-gray-500 p-2">
                                {{ $admission->address }}
                            </td>
                            <td class="border border-gray-500 p-2">
                                {{ $admission->course->name }}
                            </td>
                            <td class="border border-gray-500 p-2">
                                edit
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>


</x-frontend-layout>
