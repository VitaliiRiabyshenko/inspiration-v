<div class="toasts-top-right fixed mt-5 mr-3">
    <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true"
        data-delay="3000">
        <div class="toast-header">
            <img class="rounded mr-2" src="{{ asset('/img/icon/logo.svg') }}" alt="Inspiration Logo" height="30"
                width="30">
            <strong class="mr-auto">{{ config('app.name') }}</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">{{ $message }}</div>
    </div>
</div>
