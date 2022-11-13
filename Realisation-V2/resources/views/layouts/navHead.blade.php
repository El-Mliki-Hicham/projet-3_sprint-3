



@if (session('status'))
      <div class="alert alert-success alert-dismissible text-white sessionDiv" role="alert">
        <span class="text-sm">{{ session('status')}}</span>

        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>

        </button>
    </div>
    @endif
