<?php
class Mensagem
{
  public static function mostrar()
  {
    if (isset($_SERVER['msg'])) {
      $msg = $_SERVER['msg'];
      unset($_SERVER['msg']);
      return "<script>
        M.toast({
          html: '$msg'
          })
          </script>";
    }
  }
}