<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define("ALLOWED_UPLOAD_TYPE", "gif|jpg|jpeg|png");
define("MAX_UPLOAD_SIZE", 2048);

class Psb extends CI_Model {

    private function response()
    {
        $response = new stdClass();
        $response->success = FALSE;
        $response->message = "Unknown Failure";
        $response->found = FALSE;
        return $response;
    }

    private function makejson($data)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        
    }

    public function check_upload_file($field_name, $required = TRUE) {
        $response = new stdClass();
        $response->success = FALSE;
        $response->valid = FALSE;
        $response->uploaded = FALSE;
        if (isset($_FILES[$field_name])) {
            if (!empty($_FILES[$field_name]['name'])) {
                if (is_uploaded_file($_FILES[$field_name]['tmp_name'])) {
                    $response->success = TRUE;
                    $response->uploaded = TRUE;
                    $response->temp_name = $_FILES[$field_name]['tmp_name'];
                    $response->type = $_FILES[$field_name]['type'];
                    $response->name = $_FILES[$field_name]['name'];
                    $response->size = $_FILES[$field_name]['size'];
                    $response->extension = pathinfo($response->name, PATHINFO_EXTENSION);
                    $allowed = ALLOWED_UPLOAD_TYPE;
                    $allowed = explode("|", $allowed);
                    if (in_array($response->extension, $allowed)) {
                        $response->valid = TRUE;
                        $response->message = "File OK.";
                    } else {
                        $response->message = "Extension not allowed.";
                    }
                } else {
                    $response->message = "File upload failed.";
                }
            } else {
                if ($required == FALSE) {
                    $response->valid = TRUE;
                }
                $response->message = "No file uploaded.";
            }
        } else {
            $response->message = "Input field undefined.";
        }
        return $response;
    }

	public function do_upload_image($custom_path = FALSE, $new_file_name = FALSE, $overwrite = TRUE)
	{
		$config['allowed_types'] = ALLOWED_UPLOAD_TYPE;
        $config['max_size'] = MAX_UPLOAD_SIZE;
        if ($custom_path != FALSE) {
            if (is_string($custom_path)) {
                $config['upload_path'] = $custom_path;
            }
        } else {
            $config['upload_path'] = './uploads/';
        }
        if ($new_file_name != FALSE) {
            if (is_string($new_file_name)) {
                $config['file_name'] = $new_file_name;
            }
        }
        if ($overwrite == TRUE) {
            $config['overwrite'] = TRUE;
        }
		$this->load->library('upload', $config);
	}

    private function codeMaPondok()
    {
        $this->db->select('RIGHT(pendaftar.no_daftar,3) as kode', false);
        $where = ['is_ma' => 1, 'is_mts' => 0, 'is_pondok' => 1];
        $this->db->where($where);
        $this->db->order_by('id_pendaftar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pendaftar');
        if ($query->num_rows() != 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('Y') . "0101" . $kodemax;
        return $kodejadi;
    }

    private function codeMtsPondok()
    {
        $this->db->select('RIGHT(pendaftar.no_daftar,3) as kode', false);
        $where = ['is_ma' => 0, 'is_mts' => 1, 'is_pondok' => 1];
        $this->db->where($where);
        $this->db->order_by('id_pendaftar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pendaftar');
        if ($query->num_rows() != 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('Y') . "0102" . $kodemax;
        return $kodejadi;
    }

    private function codeMa()
    {
        $this->db->select('RIGHT(pendaftar.no_daftar,3) as kode', false);
        $where = ['is_ma' => 1, 'is_mts' => 0, 'is_pondok' => 0];
        $this->db->where($where);
        $this->db->order_by('id_pendaftar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pendaftar');
        if ($query->num_rows() != 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('Y') . "0201" . $kodemax;
        return $kodejadi;
    }

    private function codeMts()
    {
        $this->db->select('RIGHT(pendaftar.no_daftar,3) as kode', false);
        $where = ['is_ma' => 0, 'is_mts' => 1, 'is_pondok' => 0];
        $this->db->where($where);
        $this->db->order_by('id_pendaftar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pendaftar');
        if ($query->num_rows() != 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('Y') . "0202" . $kodemax;
        return $kodejadi;
    }

    private function codePondok()
    {
        $this->db->select('RIGHT(pendaftar.no_daftar,3) as kode', false);
        $where = ['is_ma' => 0, 'is_mts' => 0, 'is_pondok' => 1];
        $this->db->where($where);
        $this->db->order_by('id_pendaftar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pendaftar');
        if ($query->num_rows() != 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('Y') . "0303" . $kodemax;
        return $kodejadi;
    }

    public function dataList($data)
    {
        $col_order = $data['col_order'];
        $col_search = $data['col_search'];
        $order = $data['order'];
        $this->db->select($data['query']['select']);
        $this->db->from($data['query']['from']);
        if (isset($data['query']['join'])) {
            $join_count = count($data['query']['join']);
            if ($join_count > 0) {
                for ($i=0; $i < $join_count; $i++) { 
                    if (isset($data['query']['join'][$i]['type'])) {
                        $this->db->join($data['query']['join'][$i]['tbl'], $data['query']['join'][$i]['cond'], $data['query']['join'][$i]['type']);
                    } else {
                        $this->db->join($data['query']['join'][$i]['tbl'], $data['query']['join'][$i]['cond']);
                    }
                }
            }
        }
        if (isset($data['query']['where'])) {
            $this->db->where($data['query']['where']);
        }
        if (isset($data['query']['order'])) {
            $this->db->order_by($data['query']['order']);
        }
        if (isset($data['query']['limit'])) {
            $this->db->limit($data['query']['limit']);
        }
        $i = 0;
        foreach ($col_search as $item) {
            if (isset($_POST['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($col_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($col_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $dataOrder = $order;
            $this->db->order_by(key($dataOrder), $dataOrder[key($dataOrder)]);
        }
    }

    public function get_datatables($data)
    {
        $this->dataList($data);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get()->result();
    }

    public function count_filtered($data)
    {
        $this->dataList($data);
        return $this->db->get()->num_rows();
    }

    public function count_all($data)
    {
        $this->db->select('*');
        $this->db->from($data['query']['from']);
        if (isset($data['query']['join'])) {
            $join_count = count($data['query']['join']);
            if ($join_count > 0) {
                for ($i=0; $i < $join_count; $i++) { 
                    if (isset($data['query']['join'][$i]['type'])) {
                        $this->db->join($data['query']['join'][$i]['tbl'], $data['query']['join'][$i]['cond'], $data['query']['join'][$i]['type']);
                    } else {
                        $this->db->join($data['query']['join'][$i]['tbl'], $data['query']['join'][$i]['cond']);
                    }
                }
            }
        }
        if (isset($data['query']['where'])) {
            $this->db->where($data['query']['where']);
        }
        if (isset($data['query']['limit'])) {
            $this->db->limit($data['query']['limit']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function datatables_output($dataTable, $data)
    {
        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->count_all($dataTable),
            "recordsFiltered" => $this->count_filtered($dataTable),
            "data"            => $data,
        );
        $this->makejson($output);
    }

    public function get_count_table($table, $where = FALSE)
    {
        if ($where != FALSE) {
            $this->db->where($where);
        }
        return $this->db->get($table)->num_rows();
    }

    public function cek_login_psb($input)
    {
        $response = $this->response();
        $this->db->select('*')->from('admin')->where('username', $input->username);
        $query = $this->db->get();
        $data_user = $query->row();
        $count_user = $query->num_rows();
        if ($count_user > 0) {
            if (password_verify($input->password, $data_user->password)) {
                $session = [
                    'id_admin'   => $data_user->id_admin,
                    'real_name' => $data_user->real_name,
                    'level' => $data_user->level,
                    'sudah_login' => true,
                ];
                $this->db->update('admin', ['last_login' => date('Y-m-d H:i:s')], ['id_admin' => $data_user->id_admin]);
                $this->session->set_userdata($session);
                $response->success = true;
                $response->message = "Please wait while loading..";
            } else {
                $response->message = "Incorrectly Password, Please Try Again or Forgot Password";
            }
        } else {
            $response->message = "User Data Not Found";
        }
        $this->makejson($response);
    }

    public function list_pengaturan()
    {
        return $this->db->get('pengaturan')->result();
    }

    public function list_testimoni($jumlah)
    {
        $this->db->limit($jumlah);
        $this->db->order_by('id', 'desc');
        return $this->db->get('testimoni')->result();
    }

    public function list_penghasilan()
    {
        return $this->db->get('penghasilan')->result();
    }

    public function list_pengajar()
    {
        return $this->db->get('pengajar')->result();
    }

    public function get_gelombang_aktif()
    {
        $now = date('Y-m-d');
        $this->db->where('tgl_mulai <=', $now);
        $this->db->where('tgl_akhir >=', $now);
        $data = $this->db->get('gelombang')->row();
        if ($data != null) {
            return $data->id_gelombang;
        } else {
            return 0;
        }
    }

    public function registrasi_siswa_baru($input)
    {
        $response = $this->response();
        if (!property_exists($input, "catatan")) {
            $input->catatan = null;
        }
        $check_name = $this->check_name_pendaftar($input->nama_siswa);
        $response->check_name = $check_name;
        if ($check_name == true) {
            $response->message = "Nama yang dimasukkan sudah terdaftar, silahkan cek data pendaftar";
        } else {
            $gelombang = $this->get_gelombang_aktif();
            $x = $input->pilihan;
            if ($x == 1) {
                $code = $this->codeMts(); $is_mts = true; $is_ma = false; $is_pondok = false;
            } elseif ($x == 2) {
                $code = $this->codeMa(); $is_mts = false; $is_ma = true; $is_pondok = false;
            } elseif ($x == 3) {
                $code = $this->codePondok(); $is_mts = false; $is_ma = false; $is_pondok = true;
            } elseif ($x == 4) {
                $code = $this->codeMtsPondok(); $is_mts = true; $is_ma = false; $is_pondok = true;
            } elseif ($x == 5) {
                $code = $this->codeMaPondok(); $is_mts = false; $is_ma = true; $is_pondok = true;
            }
            $data = [
                'no_daftar'     => $code,
                'gelombang'     => $gelombang,
                'nama_siswa'    => ucwords($input->nama_siswa),
                'tempat_lahir'  => ucwords($input->tempat_lahir),
                'tanggal_lahir' => date('Y-m-d', strtotime($input->tgl_lahir)),
                'gender'        => $input->gender,
                'alamat'        => $input->alamat,
                'asal_sekolah'  => $input->asal_sekolah,
                'orang_tua'     => ucwords($input->orang_tua),
                'pekerjaan'     => ucwords($input->pekerjaan),
                'penghasilan'   => $input->penghasilan,
                'no_telp'       => $input->no_telp,
                'is_mts'        => $is_mts,
                'is_ma'         => $is_ma,
                'is_pondok'     => $is_pondok,
                'status'        => 0,
                'catatan'       => $input->catatan,
                'tgl_insert'    => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('pendaftar', $data);
            if ($this->db->affected_rows() == 1) {
                $response->success = true;
                $response->message = "Pendaftaran Berhasil, No Daftar Dapat Dilihat pada Menu Data Pendaftar";
            } else {
                $response->message = "Terjadi Kesalahan Saat Mendaftar, Silahkan Ulangi";
            }
        }
        $this->makejson($response);
    }

    public function check_name_pendaftar($nama)
    {
        $this->db->where('nama_siswa', $nama);
        $data = $this->db->get('pendaftar')->num_rows();
        return $data>0?true:false;
    }

    public function update_data_pendaftar($input)
    {
        $response = $this->response();
        $x = $input->pilihan;
        if ($x == 1) {
            $is_mts = true; $is_ma = false; $is_pondok = false;
        } elseif ($x == 2) {
            $is_mts = false; $is_ma = true; $is_pondok = false;
        } elseif ($x == 3) {
            $is_mts = false; $is_ma = false; $is_pondok = true;
        } elseif ($x == 4) {
            $is_mts = true; $is_ma = false; $is_pondok = true;
        } elseif ($x == 5) {
            $is_mts = false; $is_ma = true; $is_pondok = true;
        }
        $object = [
            'nama_siswa'    => $input->nama_siswa,
            'tempat_lahir'  => $input->tempat_lahir,
            'tanggal_lahir' => date('Y-m-d', strtotime($input->tgl_lahir)),
            'gender'        => $input->gender,
            'alamat'        => $input->alamat,
            'asal_sekolah'  => $input->asal_sekolah,
            'orang_tua'     => $input->orang_tua,
            'pekerjaan'     => $input->pekerjaan,
            'penghasilan'   => $input->penghasilan,
            'no_telp'       => $input->no_telp,
            'is_mts'        => $is_mts,
            'is_ma'         => $is_ma,
            'is_pondok'     => $is_pondok,
            'catatan'       => $input->catatan,
        ];
        $this->db->where('id_pendaftar', $input->id_pendaftar);
        $this->db->update('pendaftar', $object);
        if ($this->db->affected_rows() == 1) {
            $response->success = true;
            $response->id = $input->id_pendaftar;
            $response->message = "Update Pendaftaran Berhasil, No Daftar Dapat Dilihat pada Menu Data Pendaftar";
        } else {
            $response->message = "Terjadi Kesalahan Saat Mendaftar, Silahkan Ulangi";
        }
        $this->makejson($response);
    }

    public function set_data_pendaftar($input)
    {
        $response = $this->response();
        $title = $input->act==1?"Set Diterima":($input->act==2?"Set Ditolak":($input->act==3?"Menghapus":""));
        $cond = $input->act==1?['status'=>1]:($input->act==2?['status'=>2]:($input->act==3?['is_deleted'=>1]:""));
        $this->db->where_in('id_pendaftar', explode(',', $input->ids));
        $this->db->update('pendaftar', $cond);
        if ($this->db->affected_rows() > 0) {
            $response->success = true;
            $response->message = "Berhasil ".$title." Data Pendaftar Terpilih";
        } else {
            $response->message = "Terjadi Kesalahan Saat ".$title." Data, Silahkan Ulangi";
        }
        $this->makejson($response);
    }

    public function delete_data_pendaftar_permanent($id)
    {
        $response = $this->response();
        $this->db->where_in('id_pendaftar', explode(',', $id));
        $this->db->delete('pendaftar');
        if ($this->db->affected_rows() > 0) {
            $response->success = true;
            $response->message = "Berhasil Menghapus Data";
        } else {
            $response->message = "Terjadi Kesalahan Saat Menghapus Data, Silahkan Ulangi";
        }
        $this->makejson($response);
    }

    public function get_detail_siswa($id)
    {
        $response = $this->response();
        $this->db->select('*')->from('pendaftar p')
            ->join('gelombang g', 'p.gelombang = g.id_gelombang')
            ->join('penghasilan h', 'p.penghasilan = h.id_penghasilan')
            ->where('id_pendaftar', $id);
        $data = $this->db->get();
        if ($data->num_rows() == 1) {
            $response->success = true;
            $response->message = "Berhasil Mendapatkan Data";
            $response->data = $data->row();
        } else {
            $response->message = "Data Tidak Ditemukan";
        }
        return $response;
    }

    public function get_detail_pendaftar($id)
    {
        $data = $this->get_detail_siswa($id);
        $this->makejson($data);
    }

    public function tambah_data_pengguna($input)
    {
        $response = $this->response();
        $data = [
            'username' => $input->username,
            'real_name' => $input->real_name,
            'password' => password_hash($input->password, PASSWORD_DEFAULT),
            'level' => 1
        ];
        $this->db->insert('admin', $data);
        if ($this->db->affected_rows() > 0) {
            $response->success = true;
            $response->message = "Berhasil Menambahkan Pengguna";
        } else {
            $response->message = "Gagal Menambahkan Pengguna";
        }
        $this->makejson($response);
    }

    public function delete_data_pengguna($id)
    {
        $response = $this->response();
        $this->db->where_in('id_admin', explode(',', $id));
        $this->db->delete('admin');
        if ($this->db->affected_rows() > 0) {
            $response->success = true;
            $response->message = "Berhasil Menghapus Data";
        } else {
            $response->message = "Terjadi Kesalahan Saat Menghapus Data, Silahkan Ulangi";
        }
        $this->makejson($response);
    }

    public function get_statistik_pendaftar()
    {
        $result = [];
        $result[0] = $this->db->get_where('pendaftar', ['is_mts' => 1, 'is_pondok' => 0, 'is_ma' => 0])->num_rows(); 
        $result[1] = $this->db->get_where('pendaftar', ['is_ma' => 1, 'is_pondok' => 0, 'is_mts' => 0])->num_rows(); 
        $result[2] = $this->db->get_where('pendaftar', ['is_pondok' => 1, 'is_mts' => 0, 'is_ma' => 0])->num_rows(); 
        $result[3] = $this->db->get_where('pendaftar', ['is_mts' => 1, 'is_pondok' => 1, 'is_ma' => 0])->num_rows(); 
        $result[4] = $this->db->get_where('pendaftar', ['is_ma' => 1, 'is_pondok' => 1, 'is_mts' => 0])->num_rows(); 
        return $result;
    }

    public function get_statistik_gender()
    {
        $result = [];
        $result[0] = $this->db->get_where('pendaftar', ['gender' => 1])->num_rows();
        $result[1] = $this->db->get_where('pendaftar', ['gender' => 0])->num_rows();
        return $result;
    }

    public function tambah_data_pengajar($input)
    {
        $response = $this->response();
        $data = [
            'nama_pengajar' => $input->nama_pengajar,
            'lembaga' => $input->lembaga,
            'profil' => $input->profil,
            'profesi' => $input->profesi,
            'tgl_insert' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('pengajar', $data);
        if ($this->db->affected_rows() > 0) {
			$id_pengajar = $this->db->insert_id();
			$file_check = $this->check_upload_file("photo", FALSE);
			if ($file_check->valid == TRUE) {
				$path_photo = "uploads/pengajar/pengajar_".$id_pengajar;
				$this->do_upload_image("./uploads/pengajar/", "pengajar_".$id_pengajar);
				if ($this->upload->do_upload('photo')) {
					$obj = ['foto_pengajar' => $path_photo.$this->upload->data("file_ext"), ];
					$this->db->where('id_pengajar', $id_pengajar);
					$this->db->update('pengajar', $obj);
				} else {
					$response->message = "Gagal Upload Foto ".$this->upload->display_errors();
				}
			}
			$response->success = true;
			$response->message = "Berhasil Tambah Pengajar";
		} else {
			$response->message = "Gagal Menambahkan Pengajar ".$this->db->last_query();
		}
		$this->makejson($response);
    }

    public function tambah_data_testimoni($input)
    {
        $response = $this->response();
        $data = [
            'nama' => $input->nama,
            'tempat' => $input->tempat,
            'testimoni' => $input->testimoni,
        ];
        $this->db->insert('testimoni', $data);
        if ($this->db->affected_rows() > 0) {
			$id_testimoni = $this->db->insert_id();
			$file_check = $this->check_upload_file("photo", FALSE);
			if ($file_check->valid == TRUE) {
				$path_photo = "uploads/testimoni/testimoni_".$id_testimoni;
				$this->do_upload_image("./uploads/testimoni/", "testimoni_".$id_testimoni);
				if ($this->upload->do_upload('photo')) {
					$obj = ['foto' => $path_photo.$this->upload->data("file_ext"), ];
					$this->db->where('id_testimoni', $id_testimoni);
					$this->db->update('testimoni', $obj);
				} else {
					$response->message = "Gagal Upload Foto ".$this->upload->display_errors();
				}
			}
			$response->success = true;
			$response->message = "Berhasil Tambah Testimoni";
		} else {
			$response->message = "Gagal Menambahkan Testimoni ".$this->db->last_query();
		}
		$this->makejson($response);
    }

    public function get_data_pengajar()
    {
        return $this->db->get('pengajar')->result();
    }

    public function get_profil_pengajar($id)
    {
        return $this->db->get_where('pengajar', ['id_pengajar' => $id])->row();
    }

    public function get_detail_prestasi($id)
    {
        return $this->db->get_where('prestasi', ['id_prestasi' => $id])->row();
    }

    public function tambah_data_fasilitas($input)
    {
        $response = $this->response();
        $data = [
            'judul_foto' => $input->judul,
            'tgl_upload' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('fasilitas', $data);
        if ($this->db->affected_rows() > 0) {
			$id_fasilitas = $this->db->insert_id();
			$file_check = $this->check_upload_file("photo", FALSE);
			if ($file_check->valid == TRUE) {
				$path_photo = "uploads/fasilitas/fasilitas_".$id_fasilitas;
				$this->do_upload_image("./uploads/fasilitas/", "fasilitas_".$id_fasilitas);
				if ($this->upload->do_upload('photo')) {
					$obj = ['foto_fasilitas' => $path_photo.$this->upload->data("file_ext"), ];
					$this->db->where('id_fasilitas', $id_fasilitas);
					$this->db->update('fasilitas', $obj);
				} else {
					$response->message = "Gagal Upload Foto ".$this->upload->display_errors();
				}
			}
			$response->success = true;
			$response->message = "Berhasil Tambah Pengajar";
		} else {
			$response->message = "Gagal Menambahkan Pengajar ".$this->db->last_query();
		}
		$this->makejson($response);
    }

    public function tambah_data_prestasi($input)
    {
        $response = $this->response();
        $data = [
            'judul_foto' => $input->judul_foto,
            'lembaga'    => $input->lembaga,
            'keterangan' => $input->keterangan,
            'tgl_upload' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('prestasi', $data);
        if ($this->db->affected_rows() > 0) {
			$id_prestasi = $this->db->insert_id();
			$file_check = $this->check_upload_file("photo", FALSE);
			if ($file_check->valid == TRUE) {
				$path_photo = "uploads/prestasi/prestasi_".$id_prestasi;
				$this->do_upload_image("./uploads/prestasi/", "prestasi_".$id_prestasi);
				if ($this->upload->do_upload('photo')) {
					$obj = ['foto' => $path_photo.$this->upload->data("file_ext"), ];
					$this->db->where('id_prestasi', $id_prestasi);
					$this->db->update('prestasi', $obj);
				} else {
					$response->message = "Gagal Upload Foto ".$this->upload->display_errors();
				}
			}
			$response->success = true;
			$response->message = "Berhasil Tambah Prestasi";
		} else {
			$response->message = "Gagal Menambahkan Prestasi ".$this->db->last_query();
		}
		$this->makejson($response);
    }

    public function list_fasilitas($jumlah)
    {
        $this->db->limit($jumlah);
        $this->db->order_by('id_fasilitas', 'desc');
        return $this->db->get('fasilitas')->result();
    }

    public function list_prestasi()
    {
        return $this->db->get('prestasi')->result();
    }

    public function get_detail_gelombang($id)
    {
        $this->db->where('id_gelombang', $id);
        $data = $this->db->get('gelombang')->row();
        $this->makejson($data);
    }

    public function get_penghasilan()
    {
        return $this->db->get('penghasilan')->result();
    }

    public function get_data_pendaftar($id)
    {
        $this->db->select('*')->from('pendaftar d');
        $this->db->join('gelombang g', 'd.gelombang = g.id_gelombang', 'left');
        $this->db->join('penghasilan h', 'd.penghasilan = h.id_penghasilan', 'left');
        if ($id == 1) {
            $this->db->where('d.is_mts', 1);
        } elseif ($id == 2) {
            $this->db->where('d.is_ma', 1);
        } elseif ($id == 3) {
            $this->db->where('d.is_pondok', 1);
        } elseif ($id == 4) { }
        $this->db->where('d.is_deleted', 0);
        $this->db->order_by('d.id_pendaftar', 'asc');
        return $this->db->get()->result();
    }

    public function get_testimoni()
    {
        return $this->db->get('testimoni')->result();
    }
}

/* End of file Psb.php */
