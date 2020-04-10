-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 avr. 2020 à 23:38
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spirit_revision`
--

-- --------------------------------------------------------

--
-- Structure de la table `computer`
--

CREATE TABLE `computer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `os_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `computer`
--

-- --------------------------------------------------------

--
-- Structure de la table `computer_software`
--

CREATE TABLE `computer_software` (
  `software_id` int(11) NOT NULL,
  `computer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `computer_software`
--

-- --------------------------------------------------------

--
-- Structure de la table `installer_version`
--

CREATE TABLE `installer_version` (
  `rev` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(35) NOT NULL,
  `token` text NOT NULL,
  `id` int(5) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `phone_number` varchar(10) NOT NULL,
  `secure_code` varchar(50) NOT NULL,
  `in_verification` tinyint(1) NOT NULL DEFAULT 0,
  `confirmed_account` tinyint(1) DEFAULT 0,
  `recovery_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login`
--

-- --------------------------------------------------------

--
-- Structure de la table `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `os`
--

-- --------------------------------------------------------

--
-- Structure de la table `revisions`
--

CREATE TABLE `revisions` (
  `revision_id` int(11) NOT NULL,
  `computer_os` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `software`
--

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_object` text NOT NULL,
  `ticket_body` text NOT NULL,
  `creation_date` text NOT NULL,
  `ticket_submitter` varchar(30) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `tos`
--

CREATE TABLE `tos` (
  `policy` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tos`
--

INSERT INTO `tos` (`policy`, `id`) VALUES
('Terms and conditions\r\n\r\nThese terms and conditions (\"Terms\", \"Agreement\") are an agreement between Website Operator (\"Website Operator\", \"us\", \"we\" or \"our\") and you (\"User\", \"you\" or \"your\"). This Agreement sets forth the general terms and conditions of your use of the spirit-revision.com website and any of its products or services (collectively, \"Website\" or \"Services\").\r\n\r\nAccounts and membership\r\n\r\nIf you create an account on the Website, you are responsible for maintaining the security of your account and you are fully responsible for all activities that occur under the account and any other actions taken in connection with it. We may, but have no obligation to, monitor and review new accounts before you may sign in and use our Services. Providing false contact information of any kind may result in the termination of your account. You must immediately notify us of any unauthorized uses of your account or any other breaches of security. We will not be liable for any acts or omissions by you, including any damages of any kind incurred as a result of such acts or omissions. We may suspend, disable, or delete your account (or any part thereof) if we determine that you have violated any provision of this Agreement or that your conduct or content would tend to damage our reputation and goodwill. If we delete your account for the foregoing reasons, you may not re-register for our Services. We may block your email address and Internet protocol address to prevent further registration.\r\n\r\nLinks to other websites\r\n\r\nAlthough this Website may link to other websites, we are not, directly or indirectly, implying any approval, association, sponsorship, endorsement, or affiliation with any linked website, unless specifically stated herein. We are not responsible for examining or evaluating, and we do not warrant the offerings of, any businesses or individuals or the content of their websites. We do not assume any responsibility or liability for the actions, products, services, and content of any other third-parties. You should carefully review the legal statements and other conditions of use of any website which you access through a link from this Website. Your linking to any other off-site websites is at your own risk.\r\n\r\nProhibited uses\r\n\r\nIn addition to other terms as set forth in the Agreement, you are prohibited from using the Website or its Content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.\r\n\r\nIntellectual property rights\r\n\r\nThis Agreement does not transfer to you any intellectual property owned by Website Operator or third-parties, and all rights, titles, and interests in and to such property will remain (as between the parties) solely with Website Operator. All trademarks, service marks, graphics and logos used in connection with our Website or Services, are trademarks or registered trademarks of Website Operator or Website Operator licensors. Other trademarks, service marks, graphics and logos used in connection with our Website or Services may be the trademarks of other third-parties. Your use of our Website and Services grants you no right or license to reproduce or otherwise use any Website Operator or third-party trademarks.\r\n\r\nLimitation of liability\r\n\r\nTo the fullest extent permitted by applicable law, in no event will Website Operator, its affiliates, officers, directors, employees, agents, suppliers or licensors be liable to any person for (a): any indirect, incidental, special, punitive, cover or consequential damages (including, without limitation, damages for lost profits, revenue, sales, goodwill, use of content, impact on business, business interruption, loss of anticipated savings, loss of business opportunity) however caused, under any theory of liability, including, without limitation, contract, tort, warranty, breach of statutory duty, negligence or otherwise, even if Website Operator has been advised as to the possibility of such damages or could have foreseen such damages. To the maximum extent permitted by applicable law, the aggregate liability of Website Operator and its affiliates, officers, employees, agents, suppliers and licensors, relating to the services will be limited to an amount greater of one dollar or any amounts actually paid in cash by you to Website Operator for the prior one month period prior to the first event or occurrence giving rise to such liability. The limitations and exclusions also apply if this remedy does not fully compensate you for any losses or fails of its essential purpose.\r\n\r\nIndemnification\r\n\r\nYou agree to indemnify and hold Website Operator and its affiliates, directors, officers, employees, and agents harmless from and against any liabilities, losses, damages or costs, including reasonable attorneys\' fees, incurred in connection with or arising from any third-party allegations, claims, actions, disputes, or demands asserted against any of them as a result of or relating to your Content, your use of the Website or Services or any willful misconduct on your part.\r\n\r\nSeverability\r\n\r\nAll rights and restrictions contained in this Agreement may be exercised and shall be applicable and binding only to the extent that they do not violate any applicable laws and are intended to be limited to the extent necessary so that they will not render this Agreement illegal, invalid or unenforceable. If any provision or portion of any provision of this Agreement shall be held to be illegal, invalid or unenforceable by a court of competent jurisdiction, it is the intention of the parties that the remaining provisions or portions thereof shall constitute their agreement with respect to the subject matter hereof, and all such remaining provisions or portions thereof shall remain in full force and effect.\r\n\r\nChanges and amendments\r\n\r\nWe reserve the right to modify this Agreement or its policies relating to the Website or Services at any time, effective upon posting of an updated version of this Agreement on the Website. When we do, we will send you an email to notify you. Continued use of the Website after any such changes shall constitute your consent to such changes. Policy was created with https://www.WebsitePolicies.com\r\n\r\nAcceptance of these terms\r\n\r\nYou acknowledge that you have read this Agreement and agree to all its terms and conditions. By using the Website or its Services you agree to be bound by this Agreement. If you do not agree to abide by the terms of this Agreement, you are not authorized to use or access the Website and its Services.\r\n\r\nContacting us\r\n\r\nIf you would like to contact us to understand more about this Agreement or wish to contact us concerning any matter relating to it, you may send an email to SpiritRevision@gmail.com\r\n\r\nThis document was last updated on March 25, 2020', 5);

-- --------------------------------------------------------

--
-- Structure de la table `webclient_version`
--

CREATE TABLE `webclient_version` (
  `rev` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `os_id` (`os_id`);

--
-- Index pour la table `computer_software`
--
ALTER TABLE `computer_software`
  ADD KEY `software_id` (`software_id`),
  ADD KEY `computer_id` (`computer_id`);

--
-- Index pour la table `installer_version`
--
ALTER TABLE `installer_version`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`revision_id`);

--
-- Index pour la table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tos`
--
ALTER TABLE `tos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `webclient_version`
--
ALTER TABLE `webclient_version`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `computer`
--
ALTER TABLE `computer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `installer_version`
--
ALTER TABLE `installer_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT pour la table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `revision_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT pour la table `tos`
--
ALTER TABLE `tos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `webclient_version`
--
ALTER TABLE `webclient_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `computer`
--
ALTER TABLE `computer`
  ADD CONSTRAINT `computer_ibfk_1` FOREIGN KEY (`os_id`) REFERENCES `os` (`id`);

--
-- Contraintes pour la table `computer_software`
--
ALTER TABLE `computer_software`
  ADD CONSTRAINT `computer_software_ibfk_1` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`),
  ADD CONSTRAINT `computer_software_ibfk_2` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
