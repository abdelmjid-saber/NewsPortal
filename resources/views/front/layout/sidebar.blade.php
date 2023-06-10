            <!-- Aside -->
            <div class="basis-1/3">
                <!-- Start Search -->
                <div class="bg-neutral-900 p-8 mb-5 rounded-xl">
                    <div>
                        <h5 class="text-white text-xl text-center font-bold mb-7">{{ trans('main_trans.search') }}</h5>
                    </div>
                    <div class="w-full">
                        <form action="{{ route('search') }}" method="GET">
                            <input type="search" name="search" class="p-2 bg-black text-white rounded-[4px] w-9/11">
                            <input type="submit" value="{{ trans('main_trans.search') }}"
                                class="bg-white hover:bg-violet-700 text-black hover:text-white  p-2 cursor-pointer rounded-[4px] duration-300">
                        </form>
                    </div>
                </div>
                <!-- End Search -->
                <!-- Start Tags -->
                <div class="bg-neutral-900 p-8 mb-5 rounded-xl">
                    <div>
                        <h5 class="text-white text-xl text-center font-bold mb-7">{{ trans('main_trans.tags') }}</h5>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        @php
                            $tag_array = [];
                            $all_tags = \App\Models\Tag::select('tag_name')
                                ->distinct()
                                ->get();
                        @endphp
                        @foreach ($all_tags as $item)
                            <a href="{{ route('tag_posts_show', $item->tag_name) }}"
                                class="text-white text-sm text-center bg-black hover:bg-violet-700 w-full p-2 rounded-[4px] duration-300">{{ $item->tag_name }}</a>
                        @endforeach
                    </div>
                </div>
                <!-- End Tags -->
                <!-- Start Archive -->
                <div class="bg-neutral-900 p-8 mb-5 rounded-xl">
                    <div>
                        <h5 class="text-white text-xl text-center font-bold mb-7">{{ trans('main_trans.archive') }}</h5>
                    </div>
                    <div>
                        @php
                            $archive_array = [];
                            $all_post_data = \App\Models\Post::orderBy('id', 'desc')->get();
                            foreach ($all_post_data as $row) {
                                $ts = strtotime($row->created_at);
                                $month = date('m', $ts);
                                $month_full = date('F', $ts);
                                $year = date('Y', $ts);
                                $archive_array[] = $month . '-' . $month_full . '-' . $year;
                            }
                            $archive_array = array_values(array_unique($archive_array));
                        @endphp
                        <form action="{{ route('archive_show') }}" method="POST">
                            @csrf
                            <select name="archive_month_year" id=""
                                class="w-full p-2 bg-black text-white rounded-[4px]" onchange="this.form.submit()">
                                <option value="">Select Month</option>
                                @for ($i = 0; $i < count($archive_array); $i++)
                                    @php
                                        $temp_array = explode('-', $archive_array[$i]);
                                    @endphp
                                    <option value="{{ $temp_array[0] . '-' . $temp_array[2] }}">{{ $temp_array[1] }},
                                        {{ $temp_array[2] }}</option>
                                @endfor
                            </select>
                        </form>
                    </div>
                </div>
                <!-- End Archive -->
                <!-- Start Popular Post -->
                <div class="bg-neutral-900 p-8 rounded-xl">
                    <div>
                        <h5 class="text-white text-xl text-center font-bold mb-7">
                            {{ trans('main_trans.popular_posts') }}</h5>
                    </div>
                    <div class="flex flex-col">
                        @foreach ($global_popular_posts_data as $item)
                            @if ($loop->iteration == 5)
                            @break
                        @endif
                        <div
                            class="flex flex-col items-center bg-neutral-900 hover:bg-black  p-5 rounded-[4px] duration-300">
                            <a href="{{ route('post', $item->id) }}">
                                <img src="{{ asset('uploads/posts' . '/' . $item->post_photo) }}" alt="img"
                                    class="sm:w-52 h-32 mb-3 rounded-[4px]">
                            </a>
                            <div class="px-6">
                                <h3 class="text-white hover:text-violet-700 text-normal  text-center font-bold">
                                    <a href="{{ route('post', $item->id) }}">{{ $item->post_title }}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- End Popular Post -->
        </div>
