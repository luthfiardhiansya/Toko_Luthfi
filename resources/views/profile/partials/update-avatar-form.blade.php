<p class="text-muted small">
    Upload foto profil kamu. Format yang didukung: JPG, PNG, WebP. Maksimal 2MB.
</p>

<form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
    @csrf

    <div class="d-flex align-items-center gap-4 flex-wrap">
        <!-- AVATAR -->
        <div class="position-relative">
            <img id="avatar-preview"
                 src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}"
                 class="rounded-circle border object-fit-cover"
                 style="width: 100px; height: 100px;"
                 alt="{{ $user->name }}">
        </div>

        <!-- FILE INPUT -->
        <div class="flex-grow-1">
            <input type="file"
                   name="avatar"
                   id="avatar"
                   accept="image/*"
                   class="d-none"
                   onchange="previewAvatar(event); showFileName(this)">

            <button type="button"
                    class="btn btn-outline-secondary"
                    onclick="document.getElementById('avatar').click()">
                Pilih Foto
            </button>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-warning px-4">
            SIMPAN FOTO
        </button>
    </div>
</form>

<script>
function previewAvatar(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('avatar-preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
}

function showFileName(input) {
    const fileName = document.getElementById('file-name');
    if (input.files.length > 0) {
        fileName.innerText = input.files[0].name;
    } else {
        fileName.innerText = 'Belum ada file dipilih';
    }
}
</script>