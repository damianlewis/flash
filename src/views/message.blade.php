@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="alert {{ Session::get('flash_notification.level') }}" data-alert>
            {{ Session::get('flash_notification.message') }}
            <a href="#" class="close">&times;</a>
        </div>
    @endif
@endif