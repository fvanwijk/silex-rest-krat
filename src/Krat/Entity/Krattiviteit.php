<?php
namespace Krat\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Type;
use Swagger\Annotations as SWG;

/**
 * Krattiviteit
 *
 * @ORM\Entity
 * @ORM\Table(name="krattiviteiten")
 * @SWG\Model()
 */
class Krattiviteit
{
    /**
     * @var int
     * @Type("integer")
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @Groups({"list", "detail"})
     * @SWG\Property(required=true)
     */
    protected $id;

    /**
     * The name that describes the krattiviteit
     *
     * @var string
     * @Type("string")
     * @ORM\Column(type="string")
     * @Groups({"list", "detail"})
     * @SWG\Property()
     */
    protected $name;

}