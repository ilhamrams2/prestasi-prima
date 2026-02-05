// @ts-check
// `@type` JSDoc annotations allow editor autocompletion and type checking
// (when paired with `@ts-check`).
// There are various equivalent ways to declare your Docusaurus config.
// See: https://docusaurus.io/docs/api/docusaurus-config

import {themes as prismThemes} from 'prism-react-renderer';

// This runs in Node.js - Don't use client-side code here (browser APIs, JSX...)

/** @type {import('@docusaurus/types').Config} */
const config = {
  title: 'Portal SMK Prestasi Prima',
  tagline: 'Dokumentasi Sistem Terpadu',
  favicon: 'img/favicon.ico',

  // Future flags, see https://docusaurus.io/docs/api/docusaurus-config#future
  future: {
    v4: true, // Improve compatibility with the upcoming Docusaurus v4
  },

  // Set the production url of your site here
  url: 'http://localhost',
  // Set the /<baseUrl>/ pathname under which your site is served
  // For GitHub pages deployment, it is often '/<projectName>/'
  baseUrl: '/',

  // GitHub pages deployment config.
  // If you aren't using GitHub pages, you don't need these.
  organizationName: 'SMK Prestasi Prima',
  projectName: 'portal-documentation',

  onBrokenLinks: 'throw',

  // Even if you don't use internationalization, you can use this field to set
  // useful metadata like html lang. For example, if your site is Chinese, you
  // may want to replace "en" with "zh-Hans".
  i18n: {
    defaultLocale: 'id',
    locales: ['id'],
  },

  presets: [
    [
      'classic',
      /** @type {import('@docusaurus/preset-classic').Options} */
      ({
        docs: {
          sidebarPath: './sidebars.js',
          // Remove edit links for internal documentation
          editUrl: undefined,
        },
        blog: false, // Disable blog
        theme: {
          customCss: './src/css/custom.css',
        },
      }),
    ],
  ],

  themeConfig:
    /** @type {import('@docusaurus/preset-classic').ThemeConfig} */
    ({
      // Replace with your project's social card
      image: 'img/docusaurus-social-card.jpg',
      colorMode: {
        respectPrefersColorScheme: true,
      },
      navbar: {
        title: 'Portal Docs',
        logo: {
          alt: 'SMK Prestasi Prima Logo',
          src: 'img/logo.svg',
        },
        items: [
          {
            type: 'docSidebar',
            sidebarId: 'tutorialSidebar',
            position: 'left',
            label: 'Dokumentasi',
          },
          {
            href: '/api/documentation',
            label: 'API Reference',
            position: 'left',
          },
          {
            href: 'https://prestasiprima.sch.id',
            label: 'Website Utama',
            position: 'right',
          },
        ],
      },
      footer: {
        style: 'dark',
        links: [
          {
            title: 'Dokumentasi',
            items: [
              {
                label: 'Pendahuluan',
                to: '/docs/intro',
              },
              {
                label: 'Arsitektur',
                to: '/docs/architecture',
              },
              {
                label: 'Deployment',
                to: '/docs/deployment',
              },
              {
                label: 'Panduan Admin',
                to: '/docs/user-manual',
              },
              {
                label: 'Kontribusi',
                to: '/docs/contributing',
              },
            ],
          },
          {
            title: 'Portal',
            items: [
              {
                label: 'Website Utama',
                href: 'https://prestasiprima.sch.id',
              },
              {
                label: 'Pendaftaran Siswa',
                href: 'https://spmb.prestasiprima.sch.id',
              },
            ],
          },
          {
            title: 'Kontak',
            items: [
              {
                label: 'Email',
                href: 'mailto:admin@prestasiprima.sch.id',
              },
              {
                label: 'Instagram',
                href: 'https://instagram.com/smkprestasiprima',
              },
              {
                label: 'YouTube',
                href: 'https://youtube.com/@SEKOLAHPRESTASIPRIMA',
              },
            ],
          },
        ],
        copyright: `Copyright © ${new Date().getFullYear()} SMK Prestasi Prima. Dibangun dengan Docusaurus.`,
      },
      prism: {
        theme: prismThemes.github,
        darkTheme: prismThemes.dracula,
        additionalLanguages: ['php', 'bash', 'nginx'],
      },
    }),
};

export default config;
