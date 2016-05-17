<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use App\Models\Question;
use App\Models\Option;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Example question 1
        $q1                        = new Question;
        $q1->answer_type_id        = 1; //options
        $q1->category_id           = 1; //general
        $q1->title                 = "Asistencia al teatro";
        $q1->description           = "";
        $q1->description_suffix    = "al teatro en el último año.";
        $q1->answer_link           = "http://chequeado.com/ultimas-noticias/espinoza-el-98-de-la-poblacion-de-la-matanza-esta-conectada-a-la-red-de-agua-potable/";
        $q1->answer_title          = "Asistencia al teatro";
        $q1->answer_description    = "Detalle metodológico: Encuesta a la población de 12 años y más de localidades de más de 30.000 habitantes de todo el país. El margen de error máximo es de +/-1,63%.";
        $q1->icon                  = "fa fa-ticket";
        $q1->answer_source         = "Encuesta Nacional de Consumos Culturales y Entorno Digital del año 2013, realizada por el Sistema de Información Cultural de la Argentina (SInCA).";
        $q1->answer_source_link    = "http://www.sinca.gob.ar/sic/encuestas/archivos/teatro-01-a4.pdf";
        $q1->answer_chart          = "";
        $q1->created_at            = Carbon::now();
        $q1->updated_at            = Carbon::now();
        $q1->save();

        //Options
        $opt                    = new Option;
        $opt->question_id       = $q1->id;
        $opt->key               = "opt0";
        $opt->text              = "Fui al menos una vez por mes";
        $opt->value             = "3";
        $opt->text_answer       = "Eso es mucho, eres un gran fanático. :D";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

        $opt                    = new Option;
        $opt->question_id       = $q1->id;
        $opt->key               = "opt1";
        $opt->text              = "Fui al menos una vez cada tres meses";
        $opt->value             = "7";
        $opt->text_answer       = "Es un promedio bastante alto. Nos alegramos que te guste.";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

        $opt                    = new Option;
        $opt->question_id       = $q1->id;
        $opt->key               = "opt2";
        $opt->text              = "Fui al menos una vez cada seis meses";
        $opt->value             = "11";
        $opt->text_answer       = "No está mal, pero deberías salir más.";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

        $opt                    = new Option;
        $opt->question_id       = $q1->id;
        $opt->key               = "opt3";
        $opt->text              = "Fui al menos una vez en el año";
        $opt->value             = "18";
        $opt->text_answer       = "Deberías salir más, el teatro es muy lindo.";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

        $opt                    = new Option;
        $opt->question_id       = $q1->id;
        $opt->key               = "opt4";
        $opt->text              = "No fui en todo el año";
        $opt->value             = "82";
        $opt->text_answer       = "Deberías salir más, el teatro es muy lindo.";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();


        //Example question 2
        $q2                        = new Question;
        $q2->answer_type_id        = 1; //options
        $q2->category_id           = 1; //general
        $q2->title                 = "Grupos de edades";
        $q2->description           = "Tengo";
        $q2->description_suffix    = "de edad";
        $q2->answer_link           = "http://chequeado.com/ultimas-noticias/espinoza-el-98-de-la-poblacion-de-la-matanza-esta-conectada-a-la-red-de-agua-potable/";
        $q2->answer_title          = "Grupos de edades";
        $q2->answer_description    = "Así están compuestos los grupos de edades en Argentina";
        $q2->icon                  = "fa fa-users";
        $q2->answer_source         = "Censo Nacional 2010 del INDEC.";
        $q2->answer_source_link    = "http://www.indec.gov.ar/definitivos_bajarArchivoNacionales.asp?idc=9&arch=x&c=2010 ";
        $q2->answer_chart          = "";
        $q2->created_at            = Carbon::now();
        $q2->updated_at            = Carbon::now();
        $q2->save();

        //Options
        $opt                    = new Option;
        $opt->question_id       = $q2->id;
        $opt->key               = "opt0";
        $opt->text              = "entre 0 y 19";
        $opt->value             = "34";
        $opt->text_answer       = "Pequeñito! Perteneces al grupo más grande de poblcación.";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

        $opt                    = new Option;
        $opt->question_id       = $q2->id;
        $opt->key               = "opt1";
        $opt->text              = "entre 20 y 39";
        $opt->value             = "30";
        $opt->text_answer       = "Estás en el grupo del medio y lo compartís con el 30% de la población.";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

        $opt                    = new Option;
        $opt->question_id       = $q2->id;
        $opt->key               = "opt2";
        $opt->text              = "entre 40 y 59";
        $opt->value             = "21";
        $opt->text_answer       = "Hay un 21% de la población que te acompaña en este grupo.";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

        $opt                    = new Option;
        $opt->question_id       = $q2->id;
        $opt->key               = "opt3";
        $opt->text              = "entre 60 y 79";
        $opt->value             = "12";
        $opt->text_answer       = "¡A malcriar nietos se ha dicho!";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

        $opt                    = new Option;
        $opt->question_id       = $q2->id;
        $opt->key               = "opt4";
        $opt->text              = "más de 80";
        $opt->value             = "3";
        $opt->text_answer       = "¡Felicitaciones! Estás en el grupo más pequeño y selecto de la población.";
        $opt->icon              = "";
        $opt->image_file        = "";
        $opt->created_at   = Carbon::now();
        $opt->updated_at   = Carbon::now();
        $opt->save();

    }
}
