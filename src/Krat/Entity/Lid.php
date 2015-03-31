<?php
namespace Krat\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;


/**
 * @ORM\Entity(repositoryClass="Spray\PersistenceBundle\Repository\FilterableEntityRepository")
 * @ORM\Table(name="leden")
 * @SWG\Model(id="Lid")
 */
class Lid
{

    /**
     * @Type("integer")
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @Groups({"list", "detail"})
     * @SWG\Property(name="id",type="integer")
     */
    protected $id;

    /**
     * @Type("string")
     * @ORM\Column(type="string")
     * @Groups({"list", "detail"})
     * @SWG\Property(name="name",type="string")
     */
    protected $name;

    /**
     * @Type("string")
     * @ORM\Column(type="string")
     * @Groups({"list", "detail"})
     * @SWG\Property(name="email",type="string")
     */
    protected $email;

    /**
     * @Type("string")
     * @ORM\Column(type="string")
     * @Groups({"list", "detail"})
     * @SWG\Property(name="phone", type="string")
     */
    protected $phone;

}