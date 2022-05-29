<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Episodes;
use App\Entity\Studios;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // HBO and its episodes
        $studio = new Studios();
        $studio->setId('665115721c6f44e49be3bd3e26606026');
        $studio->setName('HBO');
        $studio->setPayment(12);
        $manager->persist($studio);

        $episode = new Episodes();
        $episode->setId('6a1db5d6610a4c048d3df9a6268c68dc');
        $episode->setName('Game of Thrones S1:E1');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('111cd2dfd8c94682988e61ca087a09a4');
        $episode->setName('Game of Thrones S1:E2');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('cd01aadd88fa4f8ca3290d118d9621a1');
        $episode->setName('Game of Thrones S1:E3');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('a4cfda21457e4e548f2c3a472decc7cb');
        $episode->setName('Game of Thrones S1:E4');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('8c67dbe173ff42f28f5e2116c111ec7a');
        $episode->setName('The Wire S2:E3');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('269c71ebfa44448ba9bfdfa7e5332def');
        $episode->setName('The Wire S2:E4');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('04072c89f0df4ef9abd329e1a7b21779');
        $episode->setName('The Wire S2:E5');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('a1b61b64ac2b443a81a492e8bddd9461');
        $episode->setName('The Sopranos S1:E10');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('6e23bc6a2163458f834d68be9a97a257');
        $episode->setName('The Sopranos S1:E11');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('e0de6ac6d72f4adc97564c358b2bbab5');
        $episode->setName('The Sopranos S1:E12');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        // Sky UK and its episodes
        $studio = new Studios();
        $studio->setId('8d713a092ebf4844840cb90d0c4a2030');
        $studio->setName('Sky UK');
        $studio->setPayment(14.67);
        $manager->persist($studio);

        $episode = new Episodes();
        $episode->setId('fcfba01219464541a70eb8677260de4d');
        $episode->setName('Moone Boy S2:E4');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('82fcbde4285b4a58977915ea15aa18ac');
        $episode->setName('Moone Boy S2:E5');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('78a7efb2bb36491996ff562f118d5a3d');
        $episode->setName('Moone Boy S2:E6');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('1d8cc21b96a44d3aaa5eebd78b4663d5');
        $episode->setName('Moone Boy S2:E7');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('907d2138009d471a9a3b7ce68c3f032d');
        $episode->setName('A League of Their Own S3:E5');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('5dce6bf9a7c54103bee9f52fadd2bafe');
        $episode->setName('A League of Their Own S3:E6');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('9f5da1a29cdc4b8f98efefb27da94a3c');
        $episode->setName('Trollied S4:E4');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('3817c276f8464c3cbcf232f05402c8d8');
        $episode->setName('Trollied S4:E5');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('25284b37846e4b8fa17fdceaf992237e');
        $episode->setName('Trollied S4:E6');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        // Showtime and its episodes
        $studio = new Studios();
        $studio->setId('75aee18236484501b209aa36f95c7e0f');
        $studio->setName('Showtime');
        $studio->setPayment(13.45);
        $manager->persist($studio);

        $episode = new Episodes();
        $episode->setId('453500796ecc476ca142c25d652a95bd');
        $episode->setName('Billions S1:E1');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('dfde22b2a3f24401b12eeccc28cf1570');
        $episode->setName('Billions S1:E2');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('710ccbe9d75445c0bc60737aa655e283');
        $episode->setName('Billions S1:E3');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('f233b0fc72e14d549d1bddfcdb2c9933');
        $episode->setName('Billions S1:E4');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('5646cdd4ac874431bf40e52237d54bea');
        $episode->setName('Billions S1:E5');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('ef35e86beb7d404b8cd2dd3f2451c33c');
        $episode->setName('Billions S1:E6');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('8ad7222c40214f8eb98473bd09bab29c');
        $episode->setName('Billions S1:E7');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('1731355b2309475bb436ae938c93c801');
        $episode->setName('Dexter S1:E1');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        // Fox and its episodes
        $studio = new Studios();
        $studio->setId('49924ec6ec6c4efca4aa8b0779c89406');
        $studio->setName('Fox');
        $studio->setPayment(17.34);
        $manager->persist($studio);

        $episode = new Episodes();
        $episode->setId('89eb6371df374163859c5d69ae0fc561');
        $episode->setName('Futurama S1:E5');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('e44eea15940f4b1ebd26ab3b114c0a14');
        $episode->setName('Futurama S1:E6');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('13f7c592d73342c98f936620e65197e2');
        $episode->setName('Futurama S1:E7');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('c1b1eb7020b345189d05000dbb05029d');
        $episode->setName('The Simpsons S21:E15');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('d5ca9218562a4c94bdca9955cec2870e');
        $episode->setName('The Simpsons S21:E15');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('e67fec32bc75428999342b782d224d37');
        $episode->setName('The Simpsons S21:E16');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('709d6e2cd99f43649921c6b1df4d725f');
        $episode->setName('The Simpsons S21:E17');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('e45bf5573d8a472292b363bd89a1379f');
        $episode->setName('The Simpsons S22:E1');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('a285e0579e01416b90260e1209c301de');
        $episode->setName('Family Guy S2:E4');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('0d146cbda0754d179bcbfb4bea360d92');
        $episode->setName('Family Guy S2:E5');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('c847be63088c4e95a818f82e3a834f22');
        $episode->setName('Family Guy S2:E6');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('1ef8e5664305443f8c07a210c5887646');
        $episode->setName('Prison Break S5:E2');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('a86ae1d1de574eb3866c2fadd7cd8a77');
        $episode->setName('Prison Break S5:E3');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $episode = new Episodes();
        $episode->setId('9159d302c3104e58a01fa397a3382b0d');
        $episode->setName('Prison Break S5:E4');
        $episode->setRightsowner($studio);
        $manager->persist($episode);

        $manager->flush();
    }
}
