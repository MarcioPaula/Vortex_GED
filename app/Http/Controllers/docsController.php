<?php

namespace App\Http\Controllers;

use App\Models\documento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use setasign\Fpdi\Fpdi;

class docsController extends Controller
{
    public function cadastro()
    {
        return view('Documentos.cadastro');
    }

    public function salvar(request $req)
    {
        $dados = $req->all();

        if ($req->hasFile('arquivo'))
        {
            $arquivo = $req->file('arquivo');
            $num = rand(1111, 9999);
            $dir = "documentos";
            $ext = $arquivo->guessClientExtension();
            $nomearquivo = "doc_" . $num . "." . $ext;
            $arquivo->move($dir, $nomearquivo);
            $dados['arquivo'] = $dir . "/" . $nomearquivo;
        }



        $doc = documento::create($dados);

        return view('Documentos.cadastro');
    }

    public function consulta(request $req)
    {
        $consulta = $req->adminlteSearch;

        $registros = documento::where('nomeDocumento','like','%'.$consulta.'%')->get();

        return view('Documentos.consulta',compact('registros'));
    }

    public function deletar($id)
    {
      $documento = documento::find($id);

        if(\File::exists(public_path($documento->arquivo)))
        {
            \File::delete(public_path($documento->arquivo));
        }

        $documento->delete();

        return redirect()->back();
    }

    public function autorizar($id)
    {

        $doc = documento::find($id);

        $fpdi = new FPDI;
        // merger operations
        $count = $fpdi->setSourceFile($doc->arquivo);
        for ($i=1; $i<=$count; $i++) {
            $template   = $fpdi->importPage($i);
            $size       = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = 10;
            $top = 295;
            $text = "Autorizado por:".Auth::user()->name."\n".Carbon::parse(now())->format('d/m/Y H:i:s')."";
            $fpdi->SetFont("helvetica", "", 15);
            $fpdi->SetTextColor(153,0,153);
            $fpdi->Text($left,$top,$text);
        }
        $fpdi->Output($doc->arquivo, 'F');

        $doc->update(['status'=>'Aprovado']);

        return redirect()->back();
    }
}
