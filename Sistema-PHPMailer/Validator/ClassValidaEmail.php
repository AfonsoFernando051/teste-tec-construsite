<?php
/**
 * Esta � uma classe feita para validar emails.
 */
class ValidaEmail{
    /**
    * A classe est�tica ValidacaoDeEmail recebe o email por par�metro e verifica:
    * Se ele tem um @;
    * Se n�o tem espa�o vazio;
    * E se o email que vem por par�metro segue o padr�o estabelecido.
    * Caso isso aconte�a, a vari�vel $encontrado recebe o valor true.
    * Depois, � verificado se o final termina com '.com' ou '.com.br', caso $encontrado seja true, e estas �ltimas valida��es sejam verdadeiras,
    * o m�todo retorna true confirmando que o email � valido, caso contr�rio, exibe um alert do javascript e retorna false;
    *@param mixed $email - string email que ser� validada.
     */
    static function ValidacaoDeEmail($email){
        $email = strtolower($email);
        $ultimaStringPCom = substr($email, -4);
        $ultimaStringPComPBR = substr($email, -7);
        $encontrado = false;
        $padrao = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        if(strpos($email, '@') && (strpos($email, ' ') == false) && preg_match($padrao, $email) ){
            $encontrado = true;
        }
        
        if(($encontrado) && ($ultimaStringPCom === '.com' || $ultimaStringPComPBR === '.com.br') && filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
}