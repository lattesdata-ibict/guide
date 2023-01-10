<?php

namespace App\Controllers;

$this->session = \Config\Services::session();
$language = \Config\Services::language();

helper(['boostrap', 'url', 'sisdoc_forms', 'form', 'nbr', 'sessions', 'cookie']);
define("PATH", base_url());
define("URL", base_url());
define("MODULE", '/admin');
define("COLLECTION", '/guide');

class Guide extends BaseController
{
    public function socials($d1='',$d2='',$d3='',$d4='',$d5='')
        {
            $cmd = get("cmd");
            if ($cmd != '') { $d1 = $cmd; }
            $Socials = new \App\Models\Socials();
            $sx = $Socials->index($d1,$d2,$d3,$d4,$d5);
            return $sx;
        }


    public function index($d1='', $d2 ='', $d3 ='', $d4 = '')
    {
        $project = new \App\Models\Guide\GuideProject();

        $dt = $project->where('pj_path',$d1)->first();
        if ($dt == '')
            {
                $dt = $project->first();
                if ($dt == '') {
                    echo "ERRO DE ACESSO AO GUIA";
                    exit;
                }
            }

        $prj = $dt['id_pj'];

        $sx = view('Headers/header');
        $sx .= view('Headers/navbar');

        $sx .= bs($project->view_guide($prj, $d3, $d4));

        $sx .= view('Headers/footer');
        return $sx;
    }
}
