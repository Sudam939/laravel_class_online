<x-frontend-layout>

    <section>
        <div class="container m-auto">
            <h3 class="text-2xl text-center pb-5">Create Course</h3>
            <form action="{{ route('store-course') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="name">Course Name</label>
                        <input type="text" name="name" id="name" class="w-full rounded-md">
                        @error('name')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="price">Course Price (in Nrs.)</label>
                        <input type="number" name="price" id="price" class="w-full rounded-md">
                        @error('price')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="syllabus">Course Syllabus</label>
                        <textarea name="syllabus" id="syllabus" cols="30" rows="5" class="w-full rounded-md"></textarea>
                        @error('syllabus')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="image">Course Image</label>
                        <input type="file" name="image" id="image" class="w-full rounded-md">
                        @error('image')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
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
                        <th class="border border-gray-500 p-2">Image</th>
                        <th class="border border-gray-500 p-2">Name</th>
                        <th class="border border-gray-500 p-2">Price</th>
                        <th class="border border-gray-500 p-2">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($courses as $index => $course)
                        <tr>
                            <td class="border border-gray-500 p-2">
                                {{ ++$index }}
                            </td>
                            <td class="border border-gray-500 p-2">
                                <img src="{{ asset($course->image) }}" alt="" class="w-16 h-16 rounded-md">
                            </td>
                            <td class="border border-gray-500 p-2">
                                {{ $course->name }}
                            </td>
                            <td class="border border-gray-500 p-2">
                                Rs {{ $course->price }} /-
                            </td>
                            <td class="border border-gray-500 p-2">
                                <a href="{{ route('edit-course', $course->id) }}">Edit</a>

                                <form action="{{ route('delete-course', $course->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>

</x-frontend-layout>
