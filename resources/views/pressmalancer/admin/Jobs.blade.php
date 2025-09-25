<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Kelola Pekerjaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex flex-col">

  <!-- 🔹 Header -->
  <header class="bg-orange-500 text-white p-4 shadow flex justify-between items-center">
    <h1 class="text-xl font-bold">Admin - Kelola Pekerjaan</h1>
    <button onclick="toggleForm()" class="bg-white text-orange-600 px-4 py-2 rounded-lg shadow hover:bg-gray-100">
      + Tambah Pekerjaan
    </button>
  </header>

  <!-- 🔹 Form Tambah Pekerjaan -->
  <section id="job-form" class="hidden bg-white shadow p-6 m-4 rounded-lg">
    <form action="{{ route('admin.jobs.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
      @csrf
      <div>
        <label class="block text-sm font-medium">Judul Pekerjaan</label>
        <input type="text" name="title" class="w-full border px-3 py-2 rounded-lg" required>
      </div>
      <div>
        <label class="block text-sm font-medium">Perusahaan</label>
        <select name="company_id" class="w-full border px-3 py-2 rounded-lg" required>
          @foreach($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium">Lokasi</label>
        <input type="text" name="location" class="w-full border px-3 py-2 rounded-lg" required>
      </div>
      <div>
        <label class="block text-sm font-medium">Gaji</label>
        <input type="number" name="salary" class="w-full border px-3 py-2 rounded-lg">
      </div>
      <div class="col-span-2">
        <label class="block text-sm font-medium">Deskripsi</label>
        <textarea name="description" rows="4" class="w-full border px-3 py-2 rounded-lg" required></textarea>
      </div>
      <div class="col-span-2 flex justify-end">
        <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600">
          Simpan
        </button>
      </div>
    </form>
  </section>

  <!-- 🔹 Main Layout -->
  <div class="flex flex-grow overflow-hidden">
    <!-- Kiri: Job List -->
    <aside class="w-1/3 border-r overflow-y-auto bg-white">
      @if($jobs->isEmpty())
        <div class="p-6 text-center text-gray-500 font-medium">Tidak ada pekerjaan.</div>
      @else
        @foreach($jobs as $job)
        <div class="p-4 border-b hover:bg-orange-50 cursor-pointer"
             onclick="showJob({{ $job->id }})">
          <h2 class="font-semibold text-gray-800">{{ $job->title }}</h2>
          <p class="text-sm text-gray-600">{{ $job->company->name ?? 'Perusahaan Tidak Diketahui' }}</p>
          <p class="text-xs text-gray-500">{{ $job->location }} • {{ $job->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
      @endif
    </aside>

    <!-- Kanan: Job Detail -->
    <section id="job-detail" class="flex-1 bg-gray-50 overflow-y-auto p-6 hidden">
      <div class="bg-white shadow rounded-xl p-6">
        <h2 id="job-title" class="text-2xl font-bold text-gray-800">Pilih pekerjaan di sebelah kiri</h2>
        <p id="job-company" class="text-gray-600"></p>
        <p id="job-location" class="text-sm text-gray-500"></p>
        <p id="job-salary" class="text-sm text-gray-700 font-medium mb-3"></p>
        <h3 class="font-semibold mb-2">Deskripsi</h3>
        <p id="job-description" class="text-gray-700 leading-relaxed mb-6"></p>
        <div class="flex gap-3">
          <form id="delete-form" method="POST">@csrf @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">
              Hapus
            </button>
          </form>
        </div>
      </div>
    </section>
  </div>

  <!-- 🔹 JS -->
  <script>
    const jobs = @json($jobs);

    function showJob(id) {
      const job = jobs.find(j => j.id === id);
      if (!job) return;

      document.getElementById("job-detail").classList.remove("hidden");
      document.getElementById("job-title").innerText = job.title;
      document.getElementById("job-company").innerText = job.company ? job.company.name : "Perusahaan Tidak Diketahui";
      document.getElementById("job-location").innerText = job.location;
      document.getElementById("job-salary").innerText = job.salary ? "Gaji: Rp " + new Intl.NumberFormat().format(job.salary) : "";
      document.getElementById("job-description").innerText = job.description;

      document.getElementById("delete-form").action = "/admin/jobs/" + job.id;
    }

    function toggleForm() {
      document.getElementById("job-form").classList.toggle("hidden");
    }
  </script>

</body>
</html>
