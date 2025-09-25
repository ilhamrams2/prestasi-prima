<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex flex-col">

  <!-- 🔹 Search Bar -->
  <div class="bg-white shadow p-4 flex flex-col md:flex-row md:items-center gap-3">
    <div class="flex-1 flex gap-2">
      <input type="text" placeholder="Masukkan kata kunci" 
             class="border rounded-lg px-4 py-2 w-full focus:ring focus:ring-orange-200">
      <select class="border rounded-lg px-4 py-2 w-40 focus:ring focus:ring-orange-200">
        <option>Jenis pekerjaan</option>
        <option>Full-time</option>
        <option>Part-time</option>
        <option>Remote</option>
      </select>
    </div>
    <div class="flex-1 flex gap-2">
      <input type="text" placeholder="Masukkan kota atau wilayah" 
             class="border rounded-lg px-4 py-2 w-full focus:ring focus:ring-orange-200">
      <button class="bg-orange-500 text-white px-6 py-2 rounded-lg shadow hover:bg-orange-600">
        Cari
      </button>
    </div>
  </div>

  <!-- 🔹 Tags -->
  <div class="px-4 py-2 flex gap-2 flex-wrap">
    <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">Backend Developer . Indonesia</span>
    <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">Data Science . DKI Jakarta</span>
    <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">UI & UX . IKN</span>
  </div>

  <!-- 🔹 Main Layout -->
  <div class="flex flex-grow overflow-hidden">

    <!-- Kiri: Job List -->
    <aside class="w-1/3 border-r overflow-y-auto bg-white">
      @foreach($jobs as $job)
      @if(!$job->is_taken)
      <div class="p-4 border-b hover:bg-orange-50 cursor-pointer flex items-center justify-between"
           onclick="showJob({{ $job->id }})">
        <div>
          <h2 class="font-semibold text-gray-800">{{ $job->title }}</h2>
          <p class="text-sm text-gray-600">{{ $job->company->name ?? 'Perusahaan Tidak Diketahui' }}</p>
          <p class="text-xs text-gray-500">{{ $job->location }} • {{ $job->created_at->diffForHumans() }}</p>
        </div>
        <img src="https://via.placeholder.com/40" alt="logo" class="w-10 h-10 object-contain">
      </div>
      @endif
      @endforeach
    </aside>

    <!-- Kanan: Job Detail -->
    <section id="job-detail" class="flex-1 bg-gray-50 overflow-y-auto p-6 hidden">
      <div class="bg-white shadow rounded-xl p-6">
        <img id="job-banner" src="https://via.placeholder.com/600x150" 
             class="w-full h-40 object-cover rounded-lg mb-4">
        <div class="flex items-center gap-4 mb-4">
          <img id="job-logo" src="https://via.placeholder.com/80" 
               class="w-20 h-20 object-contain">
          <div>
            <h2 id="job-title" class="text-2xl font-bold text-gray-800">Pilih pekerjaan di sebelah kiri</h2>
            <p id="job-company" class="text-gray-600"></p>
            <p id="job-location" class="text-sm text-gray-500"></p>
          </div>
        </div>
        <p id="job-salary" class="text-sm text-gray-700 font-medium mb-3"></p>

        <h3 class="font-semibold mb-2">Skill yang Dibutuhkan</h3>
        <div id="job-skills" class="flex flex-wrap gap-2 mb-4">
          <span class="px-3 py-1 bg-gray-100 text-sm rounded">Laravel</span>
          <span class="px-3 py-1 bg-gray-100 text-sm rounded">Tailwind</span>
        </div>

        <h3 class="font-semibold mb-2">Detail Pekerjaan</h3>
        <p id="job-description" class="text-gray-700 leading-relaxed mb-6">
          Deskripsi pekerjaan akan muncul di sini...
        </p>

        <div class="flex gap-3">
          <form id="take-form" method="POST">@csrf
            <button type="submit" 
              class="bg-orange-500 text-white px-4 py-2 rounded-lg shadow hover:bg-orange-600">
              Ambil Pekerjaan
            </button>
          </form>
          <form id="delete-form" method="POST">@csrf @method('DELETE')
            <button type="submit" 
              class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">
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

      document.getElementById("take-form").action = "/joblist/take/" + job.id;
      document.getElementById("delete-form").action = "/joblist/" + job.id;
    }
  </script>

</body>
</html>
