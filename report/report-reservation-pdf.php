
<?php

include "../core/autoload.php";
include "../core/app/model/ReservationData.php";
include "../core/app/model/HistoryReservationData.php";
include "../core/app/model/PacientData.php";
include "../core/app/model/PacientDataP.php";
include "../core/app/model/MedicData.php";
include "../core/app/model/StatusData.php";
require '../fpdf/fpdf.php';

session_start();


$reservation_id = 0;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('Location: index.php');
    die();
}

$reservation_id = $_GET['id'];

if (count($_POST) > 0) {

    $reservation_id = $_POST['id'];
}

$users = ReservationData::getById($reservation_id);

class PDF extends FPDF
{
    // Cabecera de p�gina
    function Header()
    {
        // Logo
        $this->Image('jamundi.png', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // T�tulo
        $this->Cell(120, 10, utf8_decode('Reporte de Atención DefenSalud Jamundí'), 1, 0, 'C');
        // Salto de l�nea

        $this->Ln(50);
    }

    // Pie de p�gina
    function Footer()
    {
        // Posici�n: a 1,5 cm del final
        $this->SetY(-25);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // N�mero de p�gina
        $fechaActual = date('d-m-Y');

        $this->Cell(0, 10, utf8_decode('Alcaldia de Jamundí - Pagina ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Ln(5);
        $this->Cell(0, 10, "Secretaria de Salud - Fecha: ".$fechaActual, 0, 0, 'C');
    }

    function contentPdf()
    {
        // for ($i = 1; $i <= 40; $i++)
        //     $this->Cell(0, 10, 'Imprimiendo l�nea n�mero ' . $i, 0, 1);
    }

    function TablaSimple($header, $users)
    {
        $fechaActual = date('d-m-Y');

        $this->SetFont('Times', '', 12);
        $this->Cell(40, 5, utf8_decode('Número del Caso: '), 0);
        $this->Cell(40, 5, $users->id, 0);
        $this->Ln(10);
        // $this->Line(20, 45, 210 - 20, 45); // 20mm from each Edge

        $this->Cell(0, 10, 'DATOS DEL PETICIONARIO ', 0);
        $this->Ln(12);

        $this->Cell(40, 5, "Tipo de Documento: ", 0);
        $this->Cell(60, 5, PacientDataP::getById($users->pacientp_id)->typedoc, 0);
        $this->Cell(45, 5, utf8_decode("Número de Documento : "), 0);
        $this->Cell(60, 5, PacientDataP::getById($users->pacientp_id)->numdoc, 0);
        $this->Ln(7);

        $this->Cell(40, 5, "Nombres Afectado: ", 0);
        $this->Cell(60, 5, PacientDataP::getById($users->pacientp_id)->name, 0);
        $this->Cell(40, 5, "Apellidos Afectado: ", 0);
        $this->Cell(60, 5, PacientDataP::getById($users->pacientp_id)->lastname, 0);
        $this->Ln(7);
        $this->Cell(50, 5, utf8_decode("Número de Telefono Fijo:"), 0);
        $this->Cell(50, 5, PacientDataP::getById($users->pacientp_id)->phone1, 0);
        $this->Cell(55, 5, utf8_decode("Número de Telefono Celular: "), 0);
        $this->Cell(60, 5, PacientDataP::getById($users->pacientp_id)->phone2, 0);
        $this->Ln(7);

        $this->Cell(40, 5, "Correo Electronico: ", 0);
        $this->Cell(60, 5, PacientDataP::getById($users->pacientp_id)->email, 0);
        $this->Ln(12);

        $this->Line(20, 115, 210 - 20, 115);

        $this->Cell(0, 10, 'DATOS DEL AFECTADO ', 0);
        $this->Ln(12);

        $this->Cell(40, 5, "Tipo de Documento: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->typedoc, 0);
        $this->Cell(45, 5, utf8_decode("Número de Documento : "), 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->numdoc, 0);
        $this->Ln(7);

        $this->Cell(40, 5, "Nombres Afectado: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->name, 0);
        $this->Cell(40, 5, "Apellidos Afectado: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->lastname, 0);
        $this->Ln(7);

        $this->Cell(40, 5, "Genero: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->gender, 0);
        $this->Cell(40, 5, "Auto Reconocimiento: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->gender2, 0);
        $this->Ln(7);

        $this->Cell(40, 5, utf8_decode("Tipo de población: "), 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->typepobla, 0);
        $this->Cell(45, 5, utf8_decode("Clasificacion Población: "), 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->typepobla2, 0);
        $this->Ln(7);

        $this->Cell(40, 5, "Tipo Discapacidad: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->typedisca, 0);
        $this->Ln(7);

        $this->Cell(50, 5, utf8_decode("Número de Telefono Fijo:"), 0);
        $this->Cell(50, 5, PacientData::getById($users->pacient_id)->phone, 0);
        $this->Cell(55, 5, utf8_decode("Número de Telefono Celular: "), 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->phonecel, 0);
        $this->Ln(7);

        $this->Cell(40, 5, "Correo Electronico: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->email, 0);
        $this->Ln(7);

        $this->Cell(40, 5, "Municipio:", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->address2, 0);
        $this->Cell(45, 5, "Corregimiento: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->address3, 0);
        $this->Ln(7);
        $this->Cell(40, 5, utf8_decode("Dirección:"), 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->address, 0);
        $this->Ln(7);

        $this->Cell(40, 5, "EPS:", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->eps, 0);
        $this->Cell(40, 5, "Tipo de Regimen: ", 0);
        $this->Cell(60, 5, PacientData::getById($users->pacient_id)->typereg, 0);
        $this->Ln(7);

        $this->Line(20, 200, 210 - 20, 200);

        $this->Ln(10);
        $this->Cell(0, 10, 'DATOS DE LA SOLICITUD ', 0);
        $this->Ln(12);

        $this->Cell(40, 5, utf8_decode("Fecha de la petición:"), 0);
        $this->Cell(60, 5, $users->created_at, 0);
        $this->Cell(40, 5, "", 0);
        $this->Cell(60, 5, "", 0);
        $this->Ln(7);

        $this->Cell(40, 5, utf8_decode("Origen de la Petición:"), 0);
        $this->Cell(60, 5, $users->orpeticion, 0);
        $this->Cell(40, 5, "Tipo de Caso: ", 0);
        $this->Cell(60, 5, $users->typecase, 0);
        $this->Ln(7);

        $this->Cell(40, 5, utf8_decode("Descripción: "), 0);
        $this->Cell(60, 5, $users->description, 0);
        $this->Ln(7);

        $this->Cell(40, 5, utf8_decode("Número de Radicado:"), 0);
        $this->Cell(60, 5, $users->numrad, 0);
        $this->Cell(40, 5, "Dias Habiles: ", 0);
        $this->Cell(60, 5, date('d', abs(strtotime($users->end_at) - strtotime($fechaActual))), 0);
        $this->Ln(7);

        $this->Cell(40, 5, "Diagnostico:", 0);
        $this->Cell(60, 5, "$users->diagnostico", 0);
        $this->Cell(40, 5, "El afectado esta: ", 0);
        $this->Cell(60, 5, $users->conafec, 0);
        $this->Ln(7);

        $this->Cell(40, 5, utf8_decode("Funcionario creación:"), 0);
        $this->Cell(60, 5, MedicData::getById($users->funci_id1)->name, 0);
        $this->Cell(40, 5, "Funcionario Asignado : ", 0);
        $this->Cell(60, 5, MedicData::getById($users->funci_id2)->name, 0);
        $this->Ln(7);

        //$this->Line(20, 220, 210 - 20, 220);

        $this->Ln(10);
        $this->Cell(0, 10, 'GESTION REALIZADA ', 0);
        $this->Ln(12);


        foreach ($header as $col)
            $this->Cell(30, 5, $col, 1);
        $this->Ln();
        //Aca se debe hacer un for
        $usersres = HistoryReservationData::getByIdReservation($users->id);

        foreach($usersres as $user){
            $this->Cell(30, 5, $user->tiposeguimiento, 1);
            $this->Cell(30, 5, $user->descripcion, 1);
            $this->Cell(30, 5, "", 1);
            $this->Cell(30, 5, $user->estado, 1);
            $this->Cell(30, 5, "", 1);
            $this->Cell(30, 5, $user->created_at, 1);
            $this->Ln();
        }
    }
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$header = array('Tipo de Segui', 'Descripcion', 'Origen Solicitud', 'Estado', 'Creado por', 'Fecha Creacion');


$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->contentPdf();
$pdf->TablaSimple($header, $users);


$pdf->Output();

// $pdf->AddPage();
// $pdf->SetFont('Arial','B',18);
// $pdf->Cell(10,10,'Reporte de Atencion DEFENSALUD');
// //$pdf->SetFont('Arial','N',12);
// $pdf->Cell(10,40,'Numero de peticion: ');
// $pdf->Cell(120,40,$users->id,0,1,'C');
// $pdf->Cell(10,40,'Tipo de Caso: ');
// $pdf->Cell(130,40,$users->typecase,0,1,'C');
// // //header
// // $pdf->SetFont('Arial','B',14 );
// // $pdf->Cell(80,20,'Alcaldía de Jamundí 2021.',0,1,'C');
// // $pdf->SetFont('Arial','B',12);
// // $pdf->Cell(80,20,'Secretaría de Salud-Oficina TIC',0,1,'C');
// $pdf->Output();

?>