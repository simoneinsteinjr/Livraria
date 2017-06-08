<?php

namespace App\Http\Controllers;


use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Session;
use Endroid\QrCode\ErrorCorrection;
use Carbon\Carbon;
use App\Livro;
use App\Carinho;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController extends Controller
{
    public function index(){
        $livro = Livro::all();

        if(!Session::has('carinho')){
            $carinho = null;
        }
        $carinhoAntigo = Session::get('carinho');
        $carinho = new Carinho($carinhoAntigo);
        $total = $carinho->precoTotal;
        return view('index',compact('livro', 'carinho', 'total'));
    }

    public function adicionarAoCarinho(Request $request, $id){
        $livro = Livro::find($id);
        $carinhoAntigo = Session::has('carinho') ? Session::get('carinho') : null;
        $carinho = new Carinho($carinhoAntigo);
        $carinho->adicionar($livro, $livro->id);

        $request->session()->put('carinho', $carinho);
        return redirect('/');
    }

    public function gerarQr()
    {
        $livro = Livro::all();

        if(!Session::has('carinho')){
            $carinho = null;
        }

        $carinhoAntigo = Session::get('carinho');
        $carinho = new Carinho($carinhoAntigo);

        $qrCode = new QrCode();
        $mytime = Carbon::now();
        $total = $carinho->precoTotal;
        $qrCode
            ->setText('122321112;'.$total.';'.$mytime->toDateTimeString())
            ->setSize(200)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
            ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0])
            ->setLabel('Takí Código de Pagamento')
            ->setLabelFontSize(12)
            ->setLogo("takiqr.png")
            ->setLogoSize(98)
            ->setImageType(QrCode::IMAGE_TYPE_PNG)
        ;

// now we can directly output the qrcode
        header('Content-Type: '.$qrCode->getContentType());
      //  $qrCode->render();

// save it to a file
        $qrCode->save('qrcode.png');

        return view('pagamentos.create', compact('livro','carinho', 'total'));
    }


}
