<?php

namespace SimplyLink\AuthSDKBundle\Command;

use SimplyLink\AuthSDKBundle\Utils\SLoAuthConnector;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateAuthorizationLinkCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('simplylink:auth_sdk:generate_authorization_link')
            ->setDescription('Generate authorization link  for simplylink authorization server. Use this link to login with SimplyLink.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $SLAuthConnector = $this->getContainer()->get('simplylink.oauth.sdk');
        $authUrl = $SLAuthConnector->getAuthorizationCodeUrl();
    
        $output->writeln('Use this link to grant access from SimplyLink resource owner');
        $output->writeln($authUrl);
        
        return;
    }


}
