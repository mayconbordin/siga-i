<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link href="{{ asset('/css/exports/diario.css') }}" rel="stylesheet">
    </head>
    <body>
    
        <div class="header">
            <img src="{{ asset('/img/faculdade_senai.jpg') }}" />
            <h3>Diário de Classe</h3>
        </div>
        
        <h4 class="curso">Curso Superior de Tecnologia em Análise e Desenvolvimento de Sistemas</h4>
        
        <div class="info">
            <div class="left">
                <p>Unidade Curricular: S032 - Fundamentos de Sistemas de Informação</p>
                <p>Professor(es): Guilherme Dal Bianco</p>
            </div>
            <div class="right">
                <p>Realização: 19/02/2015 a 14/07/2015</p>
                <p>
                    <span>Carga Horária: 70</span>
                    <span>Turno: Noite</span>
                    <span>Turma: 2032N</span>
                </p>
            </div>
        </div>
        
        <div class="clear"></div>
        
        <table class="chamada" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                    @for ($i=0; $i<40; $i++)
                    <th class="data">02/04</th>
                    @endfor
                    
                    <th></th>
                </tr>
                
                <tr class="border">
                    <th style="width: 2%" class="center">Nº</th>
                    <th style="width: 5%" class="center">Curso</th>
                    <th style="width: 20%">Aluno</th>
                    
                    @for ($i=0; $i<40; $i++)
                    <th class="center"></th>
                    @endfor
                    
                    <th style="width: 5%" class="center">Faltas</th>
                </tr>
            </thead>
            <tbody>
                @for ($j=0; $j<40; $j++)
                <tr>
                    <td class="center">{{ $j }}</td>
                    <td class="center">ADS</td>
                    <td><div>ALEXSANDER DE OLIVEIRA DA SILVA</div></td>
                    
                    @for ($i=0; $i<40; $i++)
                    <td class="center">{{ ($j == 35) ? 'X' : '' }}</td>
                    @endfor
                    
                    <td class="center">0</td>
                </tr>
                @endfor
            </tbody>
        </table>
        
        
        <script type="text/javascript">
        
            function connect(div1, div2, color, thickness) {
                var off1 = getOffset(div1);
                var off2 = getOffset(div2);
                // bottom right
                var x1 = off1.left + off1.width;
                var y1 = off1.top + off1.height;
                // top right
                var x2 = off2.left + off2.width;
                var y2 = off2.top;
                // distance
                var length = Math.sqrt(((x2-x1) * (x2-x1)) + ((y2-y1) * (y2-y1)));
                // center
                var cx = ((x1 + x2) / 2) - (length / 2);
                var cy = ((y1 + y2) / 2) - (thickness / 2);
                // angle
                var angle = Math.atan2((y1-y2),(x1-x2))*(180/Math.PI);
                // make hr
                var htmlLine = "<div style='padding:0px; margin:0px; height:" 
                             + thickness + "px; background-color:" + color 
                             + "; line-height:1px; position:absolute; left:" 
                             + cx + "px; top:" + cy + "px; width:" + length 
                             + "px; transform:rotate(" + angle + "deg);' />";
                //
                //alert(htmlLine);
                document.body.innerHTML += htmlLine; 
            }

            function getOffset( el ) {
                var _x = 0;
                var _y = 0;
                var _w = el.offsetWidth|0;
                var _h = el.offsetHeight|0;
                while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
                    _x += el.offsetLeft - el.scrollLeft;
                    _y += el.offsetTop - el.scrollTop;
                    el = el.offsetParent;
                }
                return { top: _y, left: _x, width: _w, height: _h };
            }
            
            
            /*window.onload = function() {
                var div1 = document.getElementById('td1');
                var div2 = document.getElementById('td2');
                connect(div1, div2, "#000000", 1);
            };*/
        
        </script>
        
        
        
        <div style="padding:0px; margin:0px; height: 5px; background-color: #000000; line-height:1px; position:absolute; left:{{ $line['cx'] }}px; top:{{ $line['cy'] }}px; width:{{ $line['width'] }}px; transform:rotate({{ $line['angle'] }}deg); -webkit-print-color-adjust: exact;" />
        
        <!--
            top : 123px
            left: 326px
            
            width of data: 18px
            height of row: 13px
            
            x2 = (40 * 18) + 326
            
            
            x2: 1046px
            y2: 520px
            
        
        -->

    </body>
</html>
