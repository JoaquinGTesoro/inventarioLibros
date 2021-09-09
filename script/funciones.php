<?php

  function generarSVGs() {
    return "<td><svg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'>
    <g clip-path='url(#clip0)'>
    <path d='M19.4488 5.55079L17.648 7.35157C17.4644 7.53516 17.1675 7.53516 16.9839 7.35157L12.648 3.01563C12.4644 2.83203 12.4644 2.53516 12.648 2.35156L14.4488 0.550782C15.1792 -0.179688 16.3667 -0.179688 17.1011 0.550782L19.4488 2.89844C20.1831 3.62891 20.1831 4.81641 19.4488 5.55079ZM11.1011 3.89844L0.843311 14.1563L0.0151877 18.9024C-0.0980934 19.543 0.4605 20.0977 1.10112 19.9883L5.84721 19.1563L16.105 8.89844C16.2886 8.71485 16.2886 8.41798 16.105 8.23438L11.7691 3.89844C11.5816 3.71485 11.2847 3.71485 11.1011 3.89844ZM4.84721 13.2774C4.63237 13.0625 4.63237 12.7188 4.84721 12.5039L10.8628 6.48829C11.0777 6.27344 11.4214 6.27344 11.6363 6.48829C11.8511 6.70313 11.8511 7.04688 11.6363 7.26172L5.62065 13.2774C5.4058 13.4922 5.06206 13.4922 4.84721 13.2774ZM3.43706 16.5625H5.31206V17.9805L2.79253 18.4219L1.57769 17.207L2.01909 14.6875H3.43706V16.5625Z' fill='#CFBDFF'/>
    </g>
    <defs>
    <clipPath id='clip0'>
    <rect width='20' height='20' fill='white'/>
    </clipPatd>
    </defs>
    </svg>            
    <svg width='18' height='20' viewBox='0 0 18 20' fill='none' xmlns='http://www.w3.org/2000/svg'>
      <g clip-path='url(#clip0)'>
      <path d='M16.9286 1.24983H12.2262L11.8578 0.519363C11.7798 0.363196 11.6596 0.231832 11.5108 0.14005C11.3619 0.0482666 11.1903 -0.000293756 11.0153 -0.000168627H6.53631C6.36169 -0.000837789 6.19041 0.0475415 6.04209 0.139427C5.89378 0.231312 5.77443 0.362986 5.69772 0.519363L5.32936 1.24983H0.626984C0.460698 1.24983 0.301222 1.31568 0.183639 1.43289C0.0660571 1.5501 0 1.70907 0 1.87483L0 3.12483C0 3.29059 0.0660571 3.44956 0.183639 3.56677C0.301222 3.68398 0.460698 3.74983 0.626984 3.74983H16.9286C17.0949 3.74983 17.2543 3.68398 17.3719 3.56677C17.4895 3.44956 17.5556 3.29059 17.5556 3.12483V1.87483C17.5556 1.70907 17.4895 1.5501 17.3719 1.43289C17.2543 1.31568 17.0949 1.24983 16.9286 1.24983ZM2.08472 18.242C2.11463 18.718 2.32539 19.1648 2.67411 19.4914C3.02283 19.818 3.48329 19.9998 3.96176 19.9998H13.5938C14.0723 19.9998 14.5327 19.818 14.8814 19.4914C15.2302 19.1648 15.4409 18.718 15.4708 18.242L16.3016 4.99983H1.25397L2.08472 18.242Z' fill='#CFBDFF'/>
      </g>
      <defs>
      <clipPath id='clip0'>
      <rect width='17.5556' height='20' fill='white'/>
      </clipPatd>
      </defs>
      </svg>
    </td>";
  }
  //Sacar  la información de la base de datos y en caso de haber un filtro usarlo.
  function mostrarInfo($conexion, $filtro) {
    if (isset($filtro) === true) {
      $sql = mysqli_query($conexion, "SELECT * FROM `libros` WHERE isbn LIKE '%$filtro%' or titulo LIKE '%$filtro%' or autor like '%$filtro%' or editorial like '%$filtro%' or precio like '%$filtro%'; ");
    } else {
      $sql = mysqli_query($conexion, "SELECT * FROM `libros` WHERE 1;");
    }

    if (mysqli_num_rows($sql) == 0) {
      echo "<tr><td colspam = 5>No hay datos</td></tr>";
    } else {
      while ($fila = mysqli_fetch_assoc($sql)) {
        echo "<tr>
        <td class='borde-izq'><input type='checkbox' id='cbox".$fila['ID']."' value='".$fila['ID']."'></td>
        <td>".$fila['isbn']."</td>
        <td>".utf8_encode($fila['titulo'])."</td>
        <td>".utf8_encode($fila['autor'])."</td>
        <td>".$fila['paginas']."</td>
        <td>".utf8_encode($fila['editorial'])."</td>
        <td>".$fila['edicion']."</td>
        <td>".utf8_encode($fila['idioma'])."</td>
        <td>".$fila['precio']."</td>
        ". generarSVGs()."
      </tr>";
      }
    }
  }
?>