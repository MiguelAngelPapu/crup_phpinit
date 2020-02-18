<?php
  /** Botones */
  $menu = json_encode(Datos::getInstance()->menu(),JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
  $key = array_keys(json_decode($menu, true));
  $datosbotones = json_decode($menu, true);
  /** Input */
  $input = json_encode(Datos::getInstance()->input(),JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
  $key2 = array_keys(json_decode($input, true));
  $datosinput = json_decode($input, true);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Formulario</legend>
                          <form id="for_reg">
                            <?php
                              for ($i=0; $i < count($key2); $i++) {
                                echo '<div class="form-group"><div class="col-md-8"><input id="input_'.$i.'" name="input_'.$i.'" type="'.$datosinput[$key2[$i]]['tipo'].'" placeholder="'.strtolower($key2[$i]).'" class="form-control"></div></div>';
                              }
                            ?>
                          </form>
                          <div class="form-group">
                              <div class="col-md text-center">
                                <?php
                                  for ($i=0; $i < count($key); $i++) {
                                    echo '<button style="margin-right:4px;" id="btn_'.$key[$i].'" name="btn_'.strtolower($key[$i]).'" type="button" class="btn btn-primary btn-lg mr-3"><i class="material-icons left">'.$datosbotones[$key[$i]]['icono'].'</i>'.strtolower($key[$i]).'</button>';
                                  }
                                ?>
                              </div>
                          </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
