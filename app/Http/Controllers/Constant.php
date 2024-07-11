<?php


namespace App\Http\Controllers\KemenkeuID;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Constant extends Controller
{
    /**
     * @TODO: PROD Base URL follow up ke Pusintek
     * Constant URL Development
     */
    const DEV_BASE_URL = "https://demo-account.kemenkeu.go.id/connect";
    //const PROD_BASE_URL = "https://sso.kemenkeu.go.id/connect";

    /**
     * Constant end point demo account
     */
    const AUTHORIZATION_URL = "/authorize";
    const TOKEN_URL = "/token";
    const USER_INFO_URL = "/userinfo";

    /**
     * Scope OAuth
     */
    const SCOPE = "openid profile profil.hris jabatan.hris organisasi.hris";
    const RESPONSE_TYPE = "code";
    const GRANT_TYPE = "authorization_code";

    /**
     * Endpoint Service
     */
    const SERVICE_DATA_PROFILE_HRIS_URL = "https://demo-service.kemenkeu.go.id/hris/profil/Pegawai/GetUserInfo";
    const SERVICE_DATA_JABATAN_URL = "https://demo-service.kemenkeu.go.id/hris/jabatan/Riwayat/GetCurrentJabatanByIdPegawai/{idPegawai}";
}
