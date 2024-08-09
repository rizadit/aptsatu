<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
 
class Login extends Controller
{
    protected RequestKemenkeuID $requestKemenkeuID;

    public function __construct(RequestKemenkeuID $requestKemenkeuID)
    {
        $this->requestKemenkeuID = $requestKemenkeuID;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login()
    {

        $urlBuilder = $this->requestKemenkeuID->requestCode();

        return response()
            ->redirectTo($urlBuilder);
    }

    public function callback(Request $request)
    {
        $codeCallback = $request->get('code');
        $token = $this->requestKemenkeuID->requestBearerToken($codeCallback);

        Session::put('id_token', $token['id_token']);

        //echo $this->requestKemenkeuID->requestUserInfo($token['access_token']);
        //exit();
        $dataUser = json_decode($this->requestKemenkeuID->requestUserInfo($token['access_token']));
        //print_r(dataUser);
        //exit()
        // $sessionDataUser = array(
        //     'nama' => $dataUser->Data->Nama,
        //     'nip' => $dataUser->Data->Nip18,
        //     'eselon_2' => $dataUser->Data->Esl2,
        //     'eselon_3' => $dataUser->Data->Esl3,
        //     'eselon_4' => $dataUser->Data->Esl4,
        //     'kode_organisasi' => $dataUser->Data->KodeOrganisasi,
        //     'kode_induk_organisasi' => $dataUser->Data->KodeIndukOrganisasi,
        //     'jabatan' => $dataUser->Data->Jabatan
        // );
        
        if (strpos($dataUser->Data->Esl3, 'KPKNL') !== false) {
            $sessionDataUser = array(
                'nama' => $dataUser->Data->Nama,
            'nip' => $dataUser->Data->Nip18,
            'eselon_2' => $dataUser->Data->Esl2,
            'eselon_3' => $dataUser->Data->Esl3,
            'eselon_4' => $dataUser->Data->Esl4,
            'kode_organisasi' => $dataUser->Data->KodeOrganisasi,
            'kode_induk_organisasi' => $dataUser->Data->KodeIndukOrganisasi,
            'jabatan' => $dataUser->Data->Jabatan,
                'idKantor' => substr($dataUser->Data->KodeIndukOrganisasi, 0, 8),
                'URAIAN_KANTOR' => $dataUser->Data->Esl3
            );
        } else {
            if (strpos($dataUser->Data->Esl2, 'Kantor Wilayah') !== false) {
                $sessionDataUser=array(
                    'nama' => $dataUser->Data->Nama,
            'nip' => $dataUser->Data->Nip18,
            'eselon_2' => $dataUser->Data->Esl2,
            'eselon_3' => $dataUser->Data->Esl3,
            'eselon_4' => $dataUser->Data->Esl4,
            'kode_organisasi' => $dataUser->Data->KodeOrganisasi,
            'kode_induk_organisasi' => $dataUser->Data->KodeIndukOrganisasi,
            'jabatan' => $dataUser->Data->Jabatan,
                    'idKantor' => substr($dataUser->Data->KodeIndukOrganisasi, 0, 6),
                    'URAIAN_KANTOR' => $dataUser->Data->Esl2
                );
            } else {
                $sessionDataUser = array(
                    'nama' => $dataUser->Data->Nama,
            'nip' => $dataUser->Data->Nip18,
            'eselon_2' => $dataUser->Data->Esl2,
            'eselon_3' => $dataUser->Data->Esl3,
            'eselon_4' => $dataUser->Data->Esl4,
            'kode_organisasi' => $dataUser->Data->KodeOrganisasi,
            'kode_induk_organisasi' => $dataUser->Data->KodeIndukOrganisasi,
            'jabatan' => $dataUser->Data->Jabatan,
                    'idKantor' => substr($dataUser->Data->KodeIndukOrganisasi, 0, 4),
                    'URAIAN_KANTOR' => $dataUser->Data->Esl1
                );
            }
        }
        // print_r($dataUser);
        // exit();
        Session::put('user-data', $sessionDataUser);

        // Force Logout KemenkeuID
        $uri = config('kemenkeu_id.base_uri') . config('kemenkeu_id.endsession.endpoint');

        $id_token = $token['id_token'];
        //$post_logout_redirect_uri = route('ppid.landing');
        $post_logout_redirect_uri = route('logout');
        $endsession_url = $uri . '?id_token_hint=' . $id_token . '&post_logout_redirect_uri=' . $post_logout_redirect_uri;

        $client = new Client();
        $response = $client->request('GET',$endsession_url,['verify' => false]);

        return response()
            ->redirectToRoute('dashboard');
    }
}
