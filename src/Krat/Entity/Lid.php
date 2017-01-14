<?php
namespace Krat\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;


/**
 * @ORM\Entity(repositoryClass="Spray\PersistenceBundle\Repository\FilterableEntityRepository")
 * @ORM\Table(name="leden")
 * @SWG\Model()
 */
class Lid
{

    /**
     * @var int
     *
     * @Type("integer")
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @Groups({"list", "detail"})
     * @SWG\Property(required=true)
     */
    protected $id;

    /**
     * The full name
     *
     * @var string
     *
     * @Type("string")
     * @ORM\Column(type="string")
     * @Groups({"list", "detail"})
     * @SWG\Property(name="name",type="string")
     */
    protected $name;

    /**
     * The e-mail address
     *
     * @var string
     *
     * @Type("string")
     * @ORM\Column(type="string")
     * @Groups({"list", "detail"})
     * @SWG\Property(name="email",type="string")
     */
    protected $email;

    /**
     * The home or mobile phone number of the member
     *
     * @var string
     *
     * @Type("string")
     * @ORM\Column(type="string")
     * @Groups({"list", "detail"})
     * @SWG\Property(name="phone", type="string")
     */
    protected $phone;

}