<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     *  @Assert\Length(
     *      min = 5,
     *      max = 20,
     *      minMessage = "Votre pseudo doit avoir Minimum 5 caractères",
     *      maxMessage = "Votre pseudo doit avoir Maximum 20 caractères"
     * )
     * @ORM\Column(type="string", length=20)
     */
    private $Pseudo;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $MDP;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $MDPvalid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): self
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getMDP(): ?string
    {
        return $this->MDP;
    }

    public function setMDP(string $MDP): self
    {
        $this->MDP = $MDP;

        return $this;
    }

    public function getMDPvalid(): ?string
    {
        return $this->MDPvalid;
    }

    public function setMDPvalid(string $MDPvalid): self
    {
        $this->MDPvalid = $MDPvalid;

        return $this;
    }
}
