<?php

    namespace App\Controllers;

    use App\Models\FilmModel;

    class Film extends BaseController
    {
        protected $filmModel;
        public function __construct()
        {
            $this->filmModel = new FilmModel();
        }
        public function index(): string
        {
            $data = [
                'title' => 'List Film || Prakusya',
                'film' => $this->filmModel->getFilm()
            ];
        
            return view('film/listfilm', $data);
        }

        public function detail($slug): string
        {
            $data = [
                'title' => 'List Film || Prakusya',
                'film' => $this->filmModel->getFilm($slug)
            ];

            return view('film/detail', $data);
        }

        public function delete($id)
        {
            $this->filmModel->delete($id);
            session()->setFlashdata('pesan', 'Data telah berhasil dihapus');
            return redirect()->to('/film');
        }

        public function edit($slug)
        {
            session();
            $data = [
                'title' => 'Form Edit Data || Prakusya',
                'validation' => \Config\Services::validation(),
                'film' => $this->filmModel->getFilm(($slug))
            ];

            return view('film/edit', $data);
        }

        public function create(): string
        {
            session();
            $data = [
                'title' => 'List Film || Prakusya',
                'validation' => \Config\Services::validation()
            ];

            return view('film/create', $data);
        }

        public function save()
        {
            if (
                !$this->validate([
                    'judul' => 'required|is_unique[listfilm.judul]',
                    'sutradara' => 'required',
                    'synopsis' => 'required',
                    'cover' => 'required',
                ])
            ) {
                // Menyimpan error ke dalam session dan menampilkan kembali form dengan inputan yang ada
                $validation = \Config\Services::validation();
                session()->setFlashdata('validate', 'Harap Isi Formulir Dengan Benar');
                return redirect()->to('/film/create')->withInput()->with('validation', $validation);
            }

            $slug = url_title($this->request->getVar('judul'), '-', true);
            $this->filmModel->save([
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'sutradara' => $this->request->getVar('sutradara'),
                'synopsis' => $this->request->getVar('synopsis'),
                'cover' => $this->request->getVar('cover')
            ]);

            session()->setFlashdata('pesan', 'Data Telah Berhasil Ditambahkan');
            return redirect()->to('/film');
        }

        public function update($id)
        {
            $filmLama = $this->filmModel->getFilm($this->request->getVar('slug'));
            if ($filmLama['judul'] == $this->request->getVar('judul')) {
                $rule_judul = 'required';
            } else {
                $rule_judul = 'required|is_unique[listfilm.judul]';
            }

            if (!$this->validate([
                'judul' => $rule_judul,
                'sutradara' => 'required',
                'synopsis' => 'required',
                'cover' => 'required',
            ])) {
                $validation = \Config\Services::validation();

                return redirect()->to('/film/edit', $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            }

            $slug = url_title($this->request->getVar('judul'), '-', true);
            $this->filmModel->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'sutradara' => $this->request->getVar('sutradara'),
                'cover' => $this->request->getVar('cover')  
            ]);
            session()->setFlashdata('pesan', 'Data telah berhasil diedit');
            return redirect()->to('/film');
        }
    }