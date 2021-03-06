<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BBDDTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'superadmin@cev.com',
            'password' => Hash::make('admin123'),
            'api_token' => 'c2356069e9d1e79ca924378153cfbbfb4d4416b1f99d41a2940bfdb66c5319db',
        ]);

        DB::table('teachers')->insert([
            'name' => 'Teacher',
            'email' => 'teacher@cev.com',
            'password' => Hash::make('teacher123'),
        ]);

        DB::table('teachers')->insert([
            'name' => 'Daniel Palacio',
            'email' => 'dani@cev.com',
            'password' => Hash::make('dani123'),
        ]);
        
        DB::table('students')->insert([
            'name' => 'Mario Frigi',
            'email' => 'mariofrigi@cev.com',
            'password' => Hash::make('mario123'),
            'teacher_id' => '1',
            'license' => 'B',
        ]);

        DB::table('students')->insert([
            'name' => 'Mario Perez',
            'email' => 'marioperez@cev.com',
            'password' => Hash::make('mario123'),
            'teacher_id' => '1',
            'license' => 'A2',
        ]);

        DB::table('students')->insert([
            'name' => 'Raul Gonzalez',
            'email' => 'raulgon@cev.com',
            'password' => Hash::make('raul123'),
            'teacher_id' => '1',
            'license' => 'A',
        ]);

        DB::table('units')->insert([
            'name' => 'Conceptos básicos',
            'img' => 'ImagesUnits/Tema1.png',
        ]);

        DB::table('units')->insert([
            'name' => 'Requisitos administrativos para vehículos a motor',
            'img' => 'ImagesUnits/Tema2.png',
        ]);

        DB::table('units')->insert([
            'name' => 'El conductor y los demás usuarios',
            'img' => 'ImagesUnits/Tema3.png',
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'Conceptos referidos al factor humano',
            'unit_id' => '1',
            'img' => 'ImagesUnitsContent/contenido1.png',
            'content_unit' => 'Conductor: Es la persona que maneja la dirección o va al mando de un vehículo, o a cuyo cargo está un animal/es.En los vehículos de aprendizaje se considera conductor al formador que está a cargo de los mandos adicionales.
            Conductor profesional: Es aquel que tiene como actividad laboral la conducción de vehículos dedicados al transporte de mercancías y personas.
            Conductor novel: Es aquel conductor con un permiso de conducción de menos de un año de antigüedad.
            Peatón: El peatón es la persona que transita a pie por las vías públicas afectadas por la Ley de Tráfico. También son peatones las personas que empujan un cochecito infantil o conducen a pie un ciclo o ciclomotor.
            Titular del vehículo: Es la persona a nombre de la cual está inscrito un vehículo en el Registro.'
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'Conceptos referidos a la vía',
            'unit_id' => '1',
            'img' => 'ImagesUnitsContent/contenido2.png',
            'content_unit' => 'Vehículo: Es el aparato apto para circular por las vías afectadas por la Ley de Tráfico.
            Vehículo de motor: Se trata del vehículo provisto de motor para su propulsión. No son vehículos a motor los ciclomotores, tranvías y vehículos de movilidad reducida.
            Tranvía: Vehículo que circula por raíles instalados en la vía.Ciclomotor: Puede ser de dos o tres ruedas y también un cuadriciclo ligero:
            Ciclomotor de dos ruedas: Vehículo provisto de un motor de potencia menor a 50 cm cúbicos y con una velocidad máxima de 45 km por hora.
            Ciclomotor de tres ruedas: Al igual que el anterior es un vehículo provisto de un motor de potencia menor a 50 cm cúbicos y con una velocidad máxima de 45 km por hora.
            Cuadriciclo ligero: Vehículo de cuatro ruedas, con masa en vacío inferior a 350 kg. Tiene un motor con potencia menor a 50 cm3 y alcanza como máximo los 45 km/hora.
            Automóvil: Vehículo de motor que sirve para el transporte de personas o cosas y la tracción de otros vehículos. Se excluyen de éste grupo los vehículos especiales.
            Vehículo especial: Vehículo autopropulsado o remolcado concebido para realizar obras o servicios. Está exceptuado por alguna de sus características de cumplir alguna condición técnica exigida. También la maquinaria agrícola y sus remolques son vehículos especiales.'
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'El conductor y los demás usuarios',
            'unit_id' => '1',
            'img' => 'ImagesUnitsContent/contenido3.png',
            'content_unit' => 'La vía es toda aquella carretera o camino público abierto al uso público y de uso común.'
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'El permiso de conducción como requisito para la conducción',
            'unit_id' => '2',
            'img' => 'ImagesUnitsContent/contenido4.png',
            'content_unit' => 'Para poder circular libremente por las vías públicas, el conductor de un vehículo debe poseer el permiso o licencia de conducción exigida por el Estado, que acredite sus aptitudes al volante.
            El permiso y la licencia de conducción acreditan a su titular como apto para la conducción por sus conocimientos y habilidades demostrados ante la Autoridad Competente. Estos permisos autorizan la circulación de vehículos en las vías afectadas por la Ley de Tráfico.
            Además de la tenencia del permiso es necesario que éste se encuentre en vigor y sea el adecuado para conducir cada tipo de vehículo.'
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'Clases de permisos de conducción',
            'unit_id' => '2',
            'img' => 'ImagesUnitsContent/contenido5.png',
            'content_unit' => 'Permiso A1:El permiso de conducción A1 autoriza a conducir ciclomotores de dos y tres ruedas, cuadriciclos ligeros, vehículos de para personas de movilidad reducida y motocicletas de menos de 125 cm cúbicos y una potencia máxima de 11 kW con o sin sidecar.
            Permiso A: El permiso de conducción A autoriza a conducir motocicletas con o sin sidecar sea cual sea su cilindrada y triciclos y cuadriciclos de motor con posibilidad de circular a más de 45 km/hora.
            Permiso A2: El permiso de conducción A2 autoriza a conducir motocicletas con una potencia máxima de 35 kW y una relación potencia/peso máxima de 0,2 kW/kg y no derivadas de un vehículo con más del doble de su potencia. La edad mínima es 18 años
            Permiso B: El permiso de conducción B autoriza a conducir vehículos automóviles de menos de 3500 kg y con un máximo de 9 plazas incluyendo la del conductor. También habilita a conducir triciclos y cuadriciclos de motor.
            Habilitarán a conducir motocicletas ligeras de las que autoriza el permiso de la clase A1 cuando el permiso B tenga una antigüedad de más de tres años.
            Permitirá conducir vehículos especiales agrícolas autopropulsados o conjuntos de los mismos con cualquier MMA.
            Podrán estos vehículos llevar enganchado un remolque de MMA inferior a 750 kg, siempre que la MMA del conjunto sea inferior a 3500 kg.
            Permiso B+E: El permiso B+E permite conducir conjuntos de vehículos compuestos por un vehículo autorizado para conducir por el permiso B y un remolque de MMA superior a 750 kilogramos.'
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'Consideraciones a tener en cuenta en los permisos de conducción',
            'unit_id' => '2',
            'img' => 'ImagesUnitsContent/contenido6.png',
            'content_unit' => 'Los conductores en posesión del permiso B desde hace más de tres años podrán conducir en territorio nacional motocicletas sin sidecar de las autorizadas por el permiso A1.
            Los ciclomotores y vehículos para personas con movilidad reducida podrán ser conducidos con la correspondiente licencia de conducción o con los permisos A1, A o B.
            Los vehículos especiales agrícolas autopropulsados cuya dimensión no exceda del límite establecido por reglamento podrán ser conducidos con el permiso B o la licencia correspondiente (LVA) siempre que no se transporten más de cinco personas incluido el conductor.
            Para conducir autobuses articulados será necesario poseer el permiso de las clases D o D1 según si las plazas del autobús exceden o no las 17 plazas.
            Es necesario tener un año de experiencia en la conducción de automóviles de los autorizados por el permiso D y superar las pruebas para la obtención del permiso D para conducir vehículos que realicen transporte escolar, transporte público o vehículos prioritarios.
            Estos vehículos no deben tener una MMA superior a 3500 kg y utilizar emisores de luces o señales acústicas especiales.
            Las Jefaturas provinciales de tráfico realizarán duplicados de permisos a petición del usuario en caso de sustracción, extravío, deterioro del original o variación de datos.'
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'Obligaciones del conductor',
            'unit_id' => '3',
            'img' => 'ImagesUnitsContent/contenido7.png',
            'content_unit' => 'El conductor no está solo en la vía y debe compartirla con todos aquellos usuarios que también tienen el derecho a usarla.
            El conductor deberá adoptar las precauciones necesarias cuando se aproxime al resto de usuarios especialmente cuando éstos sean niños, ancianos o impedidos.
            Debe también mantener su libertad de movimientos, el campo de visión necesario y una atención permanente a la conducción. Para ello debe mantener la posición adecuada en el vehículo de pasajeros y objetos transportados.'
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'La zona de incertidumbre',
            'unit_id' => '3',
            'img' => 'ImagesUnitsContent/contenido8.png',
            'content_unit' => 'La zona de incertidumbre es el espacio que rodea a peatones, vehículos y animales al que se pueden desplazar de un modo imprevisto. Ésta zona puede resultar peligrosa al no conocer cual va a ser la reacción de los demás usuarios de la vía.
            Los vehículos también tienen una zona de incertidumbre: en la parte delantera, ya que no pueden detener el vehículo automáticamente, y en la parte trasera para que así el conductor pueda frenar de forma segura. También tienen una zona de incertidumbre lateral y cabe destacar que los ciclistas también tienen su zona de incertidumbre.'
        ]);

        DB::table('unit_contents')->insert([
            'name' => 'Los peatones',
            'unit_id' => '3',
            'img' => 'ImagesUnitsContent/contenido9.png',
            'content_unit' => 'Peatón es la persona que transita a pie por las vías o terrenos sujetos a la Ley de Tráfico. También son peatones los que conducen a pie un ciclo o ciclomotor, los impedidos que circulan en silla de ruedas o los que empujan un carrito de bebé.
            Los peatones exigen del conductor una atención especial y se debe extremar las precauciones sobre todo cuando se observen niños, ancianos o trabajadores en la calzada. Los conductores deberán moderar la velocidad y adoptar precauciones con antelación cuando se acerque a ellos.
            El conductor también deberá extremar la precaución cuando se aproxime a un vehículo del que desciendan viajeros, al parar o estacionar y durante la noche en lugares poco iluminados.'
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/camion.png',
            'question' => '¿Que es la MMA de un vehículo',
            'answer_a' => 'La masa de vehículo',
            'answer_b' => 'La masa máxima autorizada para la utilización del vehículo',
            'answer_c' => 'La suma de las masas del vehículo de motor y del remolque arrastrado',
            'correct_answer' => 'answer_b',
            'unit_id' => '1',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/cuadriciclo.png',
            'question' => 'Un cuatriciclo ligero, ¿se considera un vehículo de motor?',
            'answer_a' => 'Sí',
            'answer_b' => 'No',
            'answer_c' => 'Se considera un vehículo de motor, pero no tiene las misma reglas',
            'correct_answer' => 'answer_b',
            'unit_id' => '1',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/moto.png',
            'question' => '¿Qué alumbrado llevará encendido una motocicleta durante el día?',
            'answer_a' => 'El de corto alcance o cruce',
            'answer_b' => 'El de posición o el de corto alcance',
            'answer_c' => 'Ninguno',
            'correct_answer' => 'answer_a',
            'unit_id' => '1',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/camion.png',
            'question' => 'En una autopista conduciendo un camión de 3000kg de MMA, ¿qué distancia es obligatorio dejar con el vehículo que va delante?',
            'answer_a' => '100 metros',
            'answer_b' => '50 metros',
            'answer_c' => 'La distancia de seguridad',
            'correct_answer' => 'answer_c',
            'unit_id' => '1',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/seguros.png',
            'question' => 'El seguro obligatorio, ¿cubre los daños en la persona del conductor del vehículo asegurado?',
            'answer_a' => 'Sí, en todo caso',
            'answer_b' => 'Sí, salvo cuando el conductor es el tomador del seguro.',
            'answer_c' => 'No',
            'correct_answer' => 'answer_c',
            'unit_id' => '1',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/alcohol.png',
            'question' => '¿Cúal es la tasa de alcohol máxima permitida a un conductor novel?',
            'answer_a' => '0,25 miligramos de alcohol por litro de aire espirado.',
            'answer_b' => '0,3 miligramos de alcohol por litro de aire espirado.',
            'answer_c' => '0,15 miligramos de alcohol por litro de aire espirado.',
            'correct_answer' => 'answer_c',
            'unit_id' => '1',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/fuego.png',
            'question' => 'Cuando un vehículo accidentado comienza a arder, ¿qué se debe hacer primero?',
            'answer_a' => 'Apagar el fuego',
            'answer_b' => 'Sacar rápidamente a los heridos',
            'answer_c' => 'Ir a buscar ayuda',
            'correct_answer' => 'answer_b',
            'unit_id' => '1',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/triangulos.png',
            'question' => '¿Está permitido colocar los triángulos de preseñalización de peligro a menos de 50 metros del vehículo averiado?',
            'answer_a' => 'Sí, a esa distancia ya son visibles.',
            'answer_b' => 'No, deben estar al menos a 100 metros.',
            'answer_c' => 'No.',
            'correct_answer' => 'answer_c',
            'unit_id' => '1',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/detencion.png',
            'question' => '¿Qué es una detención?',
            'answer_a' => 'La inmovilización del vehículo por necesidades de la circulación.',
            'answer_b' => 'Una parada por cualquier causa.',
            'answer_c' => 'Un estacionamiento sin bajarse del vehículo.',
            'correct_answer' => 'answer_a',
            'unit_id' => '1',
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/airbag.png',
            'question' => 'El funcionamiento del airbag,¿puede llegar a ser peligroso en un accidente?',
            'answer_a' => 'Sí, siempre',
            'answer_b' => 'Sí, si no se lleva puesto el cinturón de seguridad.',
            'answer_c' => 'No.',
            'correct_answer' => 'answer_b',
            'unit_id' => '1',
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/alcohol.png',
            'question' => 'La tasa máxima de alcoholemia permitada en sagre para conductores profesionales es...',
            'answer_a' => '0,30 gramos por litro.',
            'answer_b' => '0,30 miligramos por litro',
            'answer_c' => '0,50 gramos por litro.',
            'correct_answer' => 'answer_a',
            'unit_id' => '1',
        ]);
        
        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/camion.png',
            'question' => '¿Que es la MMA de un vehículo',
            'answer_a' => 'La masa de vehículo',
            'answer_b' => 'La masa máxima autorizada para la utilización del vehículo',
            'answer_c' => 'La suma de las masas del vehículo de motor y del remolque arrastrado',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/cuadriciclo.png',
            'question' => 'Un cuatriciclo ligero, ¿se considera un vehículo de motor?',
            'answer_a' => 'Sí',
            'answer_b' => 'No',
            'answer_c' => 'Se considera un vehículo de motor, pero no tiene las misma reglas',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/moto.png',
            'question' => '¿Qué alumbrado llevará encendido una motocicleta durante el día?',
            'answer_a' => 'El de corto alcance o cruce',
            'answer_b' => 'El de posición o el de corto alcance',
            'answer_c' => 'Ninguno',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/camion.png',
            'question' => 'En una autopista conduciendo un camión de 3000kg de MMA, ¿qué distancia es obligatorio dejar con el vehículo que va delante?',
            'answer_a' => '100 metros',
            'answer_b' => '50 metros',
            'answer_c' => 'La distancia de seguridad',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/seguros.png',
            'question' => 'El seguro obligatorio, ¿cubre los daños en la persona del conductor del vehículo asegurado?',
            'answer_a' => 'Sí, en todo caso',
            'answer_b' => 'Sí, salvo cuando el conductor es el tomador del seguro.',
            'answer_c' => 'No',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/alcohol.png',
            'question' => '¿Cúal es la tasa de alcohol máxima permitida a un conductor novel?',
            'answer_a' => '0,25 miligramos de alcohol por litro de aire espirado.',
            'answer_b' => '0,3 miligramos de alcohol por litro de aire espirado.',
            'answer_c' => '0,15 miligramos de alcohol por litro de aire espirado.',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/fuego.png',
            'question' => 'Cuando un vehículo accidentado comienza a arder, ¿qué se debe hacer primero?',
            'answer_a' => 'Apagar el fuego',
            'answer_b' => 'Sacar rápidamente a los heridos',
            'answer_c' => 'Ir a buscar ayuda',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/triangulos.png',
            'question' => '¿Está permitido colocar los triángulos de preseñalización de peligro a menos de 50 metros del vehículo averiado?',
            'answer_a' => 'Sí, a esa distancia ya son visibles.',
            'answer_b' => 'No, deben estar al menos a 100 metros.',
            'answer_c' => 'No.',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/detencion.png',
            'question' => '¿Qué es una detención?',
            'answer_a' => 'La inmovilización del vehículo por necesidades de la circulación.',
            'answer_b' => 'Una parada por cualquier causa.',
            'answer_c' => 'Un estacionamiento sin bajarse del vehículo.',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/airbag.png',
            'question' => 'El funcionamiento del airbag,¿puede llegar a ser peligroso en un accidente?',
            'answer_a' => 'Sí, siempre',
            'answer_b' => 'Sí, si no se lleva puesto el cinturón de seguridad.',
            'answer_c' => 'No.',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/alcohol.png',
            'question' => 'La tasa máxima de alcoholemia permitada en sagre para conductores profesionales es...',
            'answer_a' => '0,30 gramos por litro.',
            'answer_b' => '0,30 miligramos por litro',
            'answer_c' => '0,50 gramos por litro.',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);
        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/camion.png',
            'question' => '¿Que es la MMA de un vehículo',
            'answer_a' => 'La masa de vehículo',
            'answer_b' => 'La masa máxima autorizada para la utilización del vehículo',
            'answer_c' => 'La suma de las masas del vehículo de motor y del remolque arrastrado',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/cuadriciclo.png',
            'question' => 'Un cuatriciclo ligero, ¿se considera un vehículo de motor?',
            'answer_a' => 'Sí',
            'answer_b' => 'No',
            'answer_c' => 'Se considera un vehículo de motor, pero no tiene las misma reglas',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/moto.png',
            'question' => '¿Qué alumbrado llevará encendido una motocicleta durante el día?',
            'answer_a' => 'El de corto alcance o cruce',
            'answer_b' => 'El de posición o el de corto alcance',
            'answer_c' => 'Ninguno',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/camion.png',
            'question' => 'En una autopista conduciendo un camión de 3000kg de MMA, ¿qué distancia es obligatorio dejar con el vehículo que va delante?',
            'answer_a' => '100 metros',
            'answer_b' => '50 metros',
            'answer_c' => 'La distancia de seguridad',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/seguros.png',
            'question' => 'El seguro obligatorio, ¿cubre los daños en la persona del conductor del vehículo asegurado?',
            'answer_a' => 'Sí, en todo caso',
            'answer_b' => 'Sí, salvo cuando el conductor es el tomador del seguro.',
            'answer_c' => 'No',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/alcohol.png',
            'question' => '¿Cúal es la tasa de alcohol máxima permitida a un conductor novel?',
            'answer_a' => '0,25 miligramos de alcohol por litro de aire espirado.',
            'answer_b' => '0,3 miligramos de alcohol por litro de aire espirado.',
            'answer_c' => '0,15 miligramos de alcohol por litro de aire espirado.',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/fuego.png',
            'question' => 'Cuando un vehículo accidentado comienza a arder, ¿qué se debe hacer primero?',
            'answer_a' => 'Apagar el fuego',
            'answer_b' => 'Sacar rápidamente a los heridos',
            'answer_c' => 'Ir a buscar ayuda',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/triangulos.png',
            'question' => '¿Está permitido colocar los triángulos de preseñalización de peligro a menos de 50 metros del vehículo averiado?',
            'answer_a' => 'Sí, a esa distancia ya son visibles.',
            'answer_b' => 'No, deben estar al menos a 100 metros.',
            'answer_c' => 'No.',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/detencion.png',
            'question' => '¿Qué es una detención?',
            'answer_a' => 'La inmovilización del vehículo por necesidades de la circulación.',
            'answer_b' => 'Una parada por cualquier causa.',
            'answer_c' => 'Un estacionamiento sin bajarse del vehículo.',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/airbag.png',
            'question' => 'El funcionamiento del airbag,¿puede llegar a ser peligroso en un accidente?',
            'answer_a' => 'Sí, siempre',
            'answer_b' => 'Sí, si no se lleva puesto el cinturón de seguridad.',
            'answer_c' => 'No.',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/alcohol.png',
            'question' => 'La tasa máxima de alcoholemia permitada en sagre para conductores profesionales es...',
            'answer_a' => '0,30 gramos por litro.',
            'answer_b' => '0,30 miligramos por litro',
            'answer_c' => '0,50 gramos por litro.',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);
        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/camion.png',
            'question' => '¿Que es la MMA de un vehículo',
            'answer_a' => 'La masa de vehículo',
            'answer_b' => 'La masa máxima autorizada para la utilización del vehículo',
            'answer_c' => 'La suma de las masas del vehículo de motor y del remolque arrastrado',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/cuadriciclo.png',
            'question' => 'Un cuatriciclo ligero, ¿se considera un vehículo de motor?',
            'answer_a' => 'Sí',
            'answer_b' => 'No',
            'answer_c' => 'Se considera un vehículo de motor, pero no tiene las misma reglas',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/moto.png',
            'question' => '¿Qué alumbrado llevará encendido una motocicleta durante el día?',
            'answer_a' => 'El de corto alcance o cruce',
            'answer_b' => 'El de posición o el de corto alcance',
            'answer_c' => 'Ninguno',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/camion.png',
            'question' => 'En una autopista conduciendo un camión de 3000kg de MMA, ¿qué distancia es obligatorio dejar con el vehículo que va delante?',
            'answer_a' => '100 metros',
            'answer_b' => '50 metros',
            'answer_c' => 'La distancia de seguridad',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/seguros.png',
            'question' => 'El seguro obligatorio, ¿cubre los daños en la persona del conductor del vehículo asegurado?',
            'answer_a' => 'Sí, en todo caso',
            'answer_b' => 'Sí, salvo cuando el conductor es el tomador del seguro.',
            'answer_c' => 'No',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/alcohol.png',
            'question' => '¿Cúal es la tasa de alcohol máxima permitida a un conductor novel?',
            'answer_a' => '0,25 miligramos de alcohol por litro de aire espirado.',
            'answer_b' => '0,3 miligramos de alcohol por litro de aire espirado.',
            'answer_c' => '0,15 miligramos de alcohol por litro de aire espirado.',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/fuego.png',
            'question' => 'Cuando un vehículo accidentado comienza a arder, ¿qué se debe hacer primero?',
            'answer_a' => 'Apagar el fuego',
            'answer_b' => 'Sacar rápidamente a los heridos',
            'answer_c' => 'Ir a buscar ayuda',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/triangulos.png',
            'question' => '¿Está permitido colocar los triángulos de preseñalización de peligro a menos de 50 metros del vehículo averiado?',
            'answer_a' => 'Sí, a esa distancia ya son visibles.',
            'answer_b' => 'No, deben estar al menos a 100 metros.',
            'answer_c' => 'No.',
            'correct_answer' => 'answer_c',
            'unit_id' => '2',
        ]);

    DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/detencion.png',
            'question' => '¿Qué es una detención?',
            'answer_a' => 'La inmovilización del vehículo por necesidades de la circulación.',
            'answer_b' => 'Una parada por cualquier causa.',
            'answer_c' => 'Un estacionamiento sin bajarse del vehículo.',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/airbag.png',
            'question' => 'El funcionamiento del airbag,¿puede llegar a ser peligroso en un accidente?',
            'answer_a' => 'Sí, siempre',
            'answer_b' => 'Sí, si no se lleva puesto el cinturón de seguridad.',
            'answer_c' => 'No.',
            'correct_answer' => 'answer_b',
            'unit_id' => '2',
        ]);

        DB::table('questions')->insert([
            'photo_url' => 'ImagesTests/alcohol.png',
            'question' => 'La tasa máxima de alcoholemia permitada en sagre para conductores profesionales es...',
            'answer_a' => '0,30 gramos por litro.',
            'answer_b' => '0,30 miligramos por litro',
            'answer_c' => '0,50 gramos por litro.',
            'correct_answer' => 'answer_a',
            'unit_id' => '2',
        ]);
    }
        
    
    
}