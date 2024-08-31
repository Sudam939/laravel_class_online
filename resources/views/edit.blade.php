<x-frontend-layout>
    <section>
        <div class="container m-auto">
            <h3 class="text-2xl text-center pb-5">Edit Course</h3>
            <form action="{{route('update-course', $course->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="name">Course Name</label>
                        <input type="text" name="name" id="name" class="w-full rounded-md" value="{{$course->name}}">
                        @error('name')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="price">Course Price (in Nrs.)</label>
                        <input type="number" name="price" id="price" class="w-full rounded-md" value="{{$course->price}}">
                        @error('price')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="syllabus">Course Syllabus</label>
                        <textarea name="syllabus" id="syllabus" cols="30" rows="5" class="w-full rounded-md">
                            {{$course->syllabus}}
                        </textarea>
                        @error('syllabus')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="image">Course Image</label>
                        <input type="file" name="image" id="image" class="w-full rounded-md pb-4">
                        @error('image')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                        <img src="{{asset($course->image)}}" width="200" alt="{{$course->name}}">
                    </div>

                    <div class="col-span-2">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

</x-frontend-layout>
