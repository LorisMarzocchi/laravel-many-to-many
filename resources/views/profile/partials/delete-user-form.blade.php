<!-- delete.blade.php -->
<section class="my-4">
    <div>
        <h2 class="display-4">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </div>

    <button
        class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#confirm-user-deletion"
    >{{ __('Delete Account') }}</button>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Are you sure you want to delete your account?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <p>
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="form-control"
                                placeholder="{{ __('Password') }}"
                            />
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </button>

                            <button type="submit" class="btn btn-danger ml-3">
                                {{ __('Delete Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
