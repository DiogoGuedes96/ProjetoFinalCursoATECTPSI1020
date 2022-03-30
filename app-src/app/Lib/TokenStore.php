<?php

namespace App\Lib;

class TokenStore
{
    /**
     * Armazena os Tokens em sessão
     */
    public static function storeTokens($accessToken)
    {
        session([
            'accessToken' => $accessToken->getToken(), //Token de acesso para interagir com a MSGraph
            'refreshToken' => $accessToken->getRefreshToken(), //Token para fazer o refresh do Token sem interação do cliente
            'tokenExpires' => $accessToken->getExpires() //Num de segundos para expirar (365 é quase 50 anos)
        ]);
    }

    /**
     * Limpar todos os Tokens da sessão guardados
     */
    public static function clearTokens()
    {
        session()->forget('accessToken');
        session()->forget('refreshToken');
        session()->forget('tokenExpires');
        session()->forget('userName');
        session()->forget('userEmail');
        session()->forget('userTimeZone');
    }


    /**
     * Devolve Token
     */
    public static function getAccessToken()
    {
        // Check if tokens exist
        if (
            empty(session('accessToken')) ||
            empty(session('refreshToken')) ||
            empty(session('tokenExpires'))
        ) {
            return '';
        }

        return session('accessToken');
    }
}
