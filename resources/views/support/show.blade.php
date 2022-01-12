<x-app-layout title="Tables">
    <div class="container grid px-6 mx-auto">
        <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
            <div class="flex items-center space-x-4">
                <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                <div class="flex flex-col leading-tight">
                    <div class="text-2xl mt-1 flex items-center">
                        <span class="text-gray-700 mr-3">{{$ticket_and_msg->account}}</span>
                    </div>
                </div>
            </div>
            @if ($ticket_and_msg->open!='0')
            <div class="flex items-center space-x-2">
                <a href="{{route('support.close', $ticket_and_msg->id)}}" type="button" class="btn btn-danger">
                    Ticketi Kapat
                </a>
            </div>
            @endif
        </div>
        <div id="messages"
            class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
            @foreach ($ticket_and_msg->ticket_msg as $msg)


            <div class="chat-message">
                <div class="flex items-end @if($msg->author == 'Yönetici') justify-end @endif">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div>
                            <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                                {{$msg->msg}}
                            </span>
                        </div>
                    </div>
                    @if ($msg->author == 'Yönetici')
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                        alt="My profile" class="w-6 h-6 rounded-full order-1">
                    @endif
                </div>
            </div>
            @endforeach

        </div>

        <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
            <div class="relative flex gap-2">
                <form action="{{route('support.add_answer', $ticket_and_msg->id)}}" method="POST" class="w-full">
                    @csrf
                    <input type="text" name="msg" placeholder="Cevabınızı yazınız"
                        class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3"
                        required>

                    <button type="submit" class="btn btn-success w-full mt-2 rounded-full">
                        Cevap Gönder
                    </button>

                </form>

            </div>
        </div>

    </div>

    <style>
        .scrollbar-w-2::-webkit-scrollbar {
            width: 0.25rem;
            height: 0.25rem;
        }

        .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity));
        }

        .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
            --bg-opacity: 1;
            background-color: #edf2f7;
            background-color: rgba(237, 242, 247, var(--bg-opacity));
        }

        .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
            border-radius: 0.25rem;
        }

    </style>

    <script>
        const el = document.getElementById('messages')
        el.scrollTop = el.scrollHeight

    </script>

</x-app-layout>