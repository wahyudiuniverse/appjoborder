<!DOCTYPE html>
<html
  lang="en"
  data-layout="vertical"
  data-topbar="light"
  data-sidebar="dark"
  data-sidebar-size="lg"
  data-sidebar-image="none"
  data-preloader="disable"
  data-theme="default"
  data-theme-colors="default">
<!-- Mirrored from themesbrand.com/velzon/html/master/job-landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2024 07:47:11 GMT -->

<head>
  <meta charset="utf-8" />
  <title>Pendaftaran Kandidat | Cakrawala Group</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta content="Form Pendaftaran Kandidat Cakrawala Group" name="description" />
  <meta content="Cakrawala Group" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" />

  <!--Swiper slider css-->
  <link
    href="<?= base_url() ?>assets/libs/swiper/swiper-bundle.min.css"
    rel="stylesheet"
    type="text/css" />

  <!-- One of the following themes -->
  <link rel="stylesheet" href="assets/libs/%40simonwep/pickr/themes/classic.min.css" /> <!-- 'classic' theme -->
  <link rel="stylesheet" href="assets/libs/%40simonwep/pickr/themes/monolith.min.css" /> <!-- 'monolith' theme -->
  <link rel="stylesheet" href="assets/libs/%40simonwep/pickr/themes/nano.min.css" /> <!-- 'nano' theme -->


  <!-- Layout config Js -->
  <script src="<?= base_url() ?>assets/js/layout.js"></script>

  <!-- jquery Js -->
  <script src="<?= base_url() ?>assets/libs/jquery/jquery-3.7.1.min.js"></script>

  <!-- select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

  <!-- dropzone css -->
  <link rel="stylesheet" href="assets/libs/dropzone/dropzone.css" type="text/css" />

  <!-- Filepond css -->
  <link rel="stylesheet" href="assets/libs/filepond/filepond.min.css" type="text/css" />
  <!-- <link href="assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">


  <!-- Bootstrap Css -->
  <link
    href="<?= base_url() ?>assets/css/bootstrap.min.css"
    rel="stylesheet"
    type="text/css" />
  <!-- Icons Css -->
  <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="<?= base_url() ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
  <!-- removeNotificationModal -->
  <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
        </div>
        <div class="modal-body">
          <div class="mt-2 text-center">
            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
              <h4>Are you sure ?</h4>
              <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
            </div>
          </div>
          <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
          </div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div hidden class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
      <!-- Dark Logo-->
      <a href="index.html" class="logo logo-dark">
        <span class="logo-sm">
          <img src="assets/images/logo-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
          <img src="assets/images/logo-dark.png" alt="" height="17">
        </span>
      </a>
      <!-- Light Logo-->
      <a href="index.html" class="logo logo-light">
        <span class="logo-sm">
          <img src="assets/images/logo-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
          <img src="assets/images/logo-light.png" alt="" height="17">
        </span>
      </a>
      <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
        <i class="ri-record-circle-line"></i>
      </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
      <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="d-flex align-items-center gap-2">
          <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
          <span class="text-start">
            <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
            <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
          </span>
        </span>
      </button>
      <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <h6 class="dropdown-header">Welcome Anna!</h6>
        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
        <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
        <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
        <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
        <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
        <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
        <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
      </div>
    </div>
    <div id="scrollbar">
      <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
          <!-- <li class="menu-title"><span data-key="t-menu">Menu</span></li> -->
          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
              <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarDashboards">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                </li>
                <li class="nav-item">
                  <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                </li>
                <li class="nav-item">
                  <a href="dashboard-job.html" class="nav-link" data-key="t-job">Job</a>
                </li>
              </ul>
            </div>
          </li> end Dashboard Menu -->
          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
              <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarApps">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                    Calendar
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarCalendar">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-calendar.html" class="nav-link" data-key="t-main-calender"> Main Calender </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-calendar-month-grid.html" class="nav-link" data-key="t-month-grid"> Month Grid </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Chat </a>
                </li>
                <li class="nav-item">
                  <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                    Email
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarEmail">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-mailbox.html" class="nav-link" data-key="t-mailbox"> Mailbox </a>
                      </li>
                      <li class="nav-item">
                        <a href="#sidebaremailTemplates" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaremailTemplates" data-key="t-email-templates">
                          Email Templates
                        </a>
                        <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                          <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                              <a href="apps-email-basic.html" class="nav-link" data-key="t-basic-action"> Basic Action </a>
                            </li>
                            <li class="nav-item">
                              <a href="apps-email-ecommerce.html" class="nav-link" data-key="t-ecommerce-action"> Ecommerce Action </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEcommerce" data-key="t-ecommerce">
                    Ecommerce
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarEcommerce">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-ecommerce-products.html" class="nav-link" data-key="t-products"> Products </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-product-details.html" class="nav-link" data-key="t-product-Details"> Product Details </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-add-product.html" class="nav-link" data-key="t-create-product"> Create Product </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-orders.html" class="nav-link" data-key="t-orders">
                          Orders </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-order-details.html" class="nav-link" data-key="t-order-details"> Order Details </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-customers.html" class="nav-link" data-key="t-customers"> Customers </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-cart.html" class="nav-link" data-key="t-shopping-cart"> Shopping Cart </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-checkout.html" class="nav-link" data-key="t-checkout"> Checkout </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-sellers.html" class="nav-link" data-key="t-sellers">
                          Sellers </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-ecommerce-seller-details.html" class="nav-link" data-key="t-sellers-details"> Seller Details </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProjects" data-key="t-projects">
                    Projects
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarProjects">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-projects-list.html" class="nav-link" data-key="t-list"> List
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-projects-overview.html" class="nav-link" data-key="t-overview"> Overview </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-projects-create.html" class="nav-link" data-key="t-create-project"> Create Project </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTasks" data-key="t-tasks"> Tasks
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarTasks">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-tasks-kanban.html" class="nav-link" data-key="t-kanbanboard">
                          Kanban Board </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-tasks-list-view.html" class="nav-link" data-key="t-list-view">
                          List View </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-tasks-details.html" class="nav-link" data-key="t-task-details"> Task Details </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCRM" data-key="t-crm"> CRM
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarCRM">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-crm-contacts.html" class="nav-link" data-key="t-contacts">
                          Contacts </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-crm-companies.html" class="nav-link" data-key="t-companies">
                          Companies </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-crm-deals.html" class="nav-link" data-key="t-deals"> Deals
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-crm-leads.html" class="nav-link" data-key="t-leads"> Leads
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrypto" data-key="t-crypto"> Crypto
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarCrypto">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-crypto-transactions.html" class="nav-link" data-key="t-transactions"> Transactions </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-crypto-buy-sell.html" class="nav-link" data-key="t-buy-sell">
                          Buy & Sell </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-crypto-orders.html" class="nav-link" data-key="t-orders">
                          Orders </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-crypto-wallet.html" class="nav-link" data-key="t-my-wallet">
                          My Wallet </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-crypto-ico.html" class="nav-link" data-key="t-ico-list"> ICO
                          List </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-crypto-kyc.html" class="nav-link" data-key="t-kyc-application"> KYC Application </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoices" data-key="t-invoices">
                    Invoices
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarInvoices">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-invoices-list.html" class="nav-link" data-key="t-list-view">
                          List View </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-invoices-details.html" class="nav-link" data-key="t-details">
                          Details </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-invoices-create.html" class="nav-link" data-key="t-create-invoice"> Create Invoice </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTickets" data-key="t-supprt-tickets">
                    Support Tickets
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarTickets">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-tickets-list.html" class="nav-link" data-key="t-list-view">
                          List View </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-tickets-details.html" class="nav-link" data-key="t-ticket-details"> Ticket Details </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarnft" data-key="t-nft-marketplace">
                    NFT Marketplace
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarnft">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-nft-marketplace.html" class="nav-link" data-key="t-marketplace"> Marketplace </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-nft-explore.html" class="nav-link" data-key="t-explore-now"> Explore Now </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-nft-auction.html" class="nav-link" data-key="t-live-auction"> Live Auction </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-nft-item-details.html" class="nav-link" data-key="t-item-details"> Item Details </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-nft-collections.html" class="nav-link" data-key="t-collections"> Collections </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-nft-creators.html" class="nav-link" data-key="t-creators"> Creators </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-nft-ranking.html" class="nav-link" data-key="t-ranking"> Ranking </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-nft-wallet.html" class="nav-link" data-key="t-wallet-connect"> Wallet Connect </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-nft-create.html" class="nav-link" data-key="t-create-nft"> Create NFT </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="apps-file-manager.html" class="nav-link"> <span data-key="t-file-manager">File Manager</span></a>
                </li>
                <li class="nav-item">
                  <a href="apps-todo.html" class="nav-link"> <span data-key="t-to-do">To Do</span></a>
                </li>
                <li class="nav-item">
                  <a href="#sidebarjobs" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarjobs" data-key="t-jobs"> Jobs</a>
                  <div class="collapse menu-dropdown" id="sidebarjobs">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="apps-job-statistics.html" class="nav-link" data-key="t-statistics"> Statistics </a>
                      </li>
                      <li class="nav-item">
                        <a href="#sidebarJoblists" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarJoblists" data-key="t-job-lists">
                          Job Lists
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarJoblists">
                          <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                              <a href="apps-job-lists.html" class="nav-link" data-key="t-list"> List
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="apps-job-grid-lists.html" class="nav-link" data-key="t-grid"> Grid </a>
                            </li>
                            <li class="nav-item">
                              <a href="apps-job-details.html" class="nav-link" data-key="t-overview"> Overview</a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a href="#sidebarCandidatelists" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCandidatelists" data-key="t-candidate-lists">
                          Candidate Lists
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCandidatelists">
                          <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                              <a href="apps-job-candidate-lists.html" class="nav-link" data-key="t-list-view"> List View
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="apps-job-candidate-grid.html" class="nav-link" data-key="t-grid-view"> Grid View</a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a href="apps-job-application.html" class="nav-link" data-key="t-application"> Application </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-job-new.html" class="nav-link" data-key="t-new-job"> New Job </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-job-companies-lists.html" class="nav-link" data-key="t-companies-list"> Companies List </a>
                      </li>
                      <li class="nav-item">
                        <a href="apps-job-categories.html" class="nav-link" data-key="t-job-categories"> Job Categories</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="apps-api-key.html" class="nav-link" data-key="t-api-key">API Key</a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
              <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Layouts</span> <span class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarLayouts">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="layouts-horizontal.html" target="_blank" class="nav-link" data-key="t-horizontal">Horizontal</a>
                </li>
                <li class="nav-item">
                  <a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a>
                </li>
                <li class="nav-item">
                  <a href="layouts-two-column.html" target="_blank" class="nav-link" data-key="t-two-column">Two Column</a>
                </li>
                <li class="nav-item">
                  <a href="layouts-vertical-hovered.html" target="_blank" class="nav-link" data-key="t-hovered">Hovered</a>
                </li>
              </ul>
            </div>
          </li> end Dashboard Menu -->

          <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
              <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarAuth">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Sign In
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarSignIn">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-signin-basic.html" class="nav-link" data-key="t-basic"> Basic
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-signin-cover.html" class="nav-link" data-key="t-cover"> Cover
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarSignUp" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignUp" data-key="t-signup"> Sign Up
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarSignUp">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-signup-basic.html" class="nav-link" data-key="t-basic"> Basic
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-signup-cover.html" class="nav-link" data-key="t-cover"> Cover
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="nav-item">
                  <a href="#sidebarResetPass" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarResetPass" data-key="t-password-reset">
                    Password Reset
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarResetPass">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-pass-reset-basic.html" class="nav-link" data-key="t-basic">
                          Basic </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-pass-reset-cover.html" class="nav-link" data-key="t-cover">
                          Cover </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="nav-item">
                  <a href="#sidebarchangePass" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarchangePass" data-key="t-password-create">
                    Password Create
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarchangePass">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-pass-change-basic.html" class="nav-link" data-key="t-basic">
                          Basic </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-pass-change-cover.html" class="nav-link" data-key="t-cover">
                          Cover </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="nav-item">
                  <a href="#sidebarLockScreen" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLockScreen" data-key="t-lock-screen">
                    Lock Screen
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarLockScreen">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-lockscreen-basic.html" class="nav-link" data-key="t-basic">
                          Basic </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-lockscreen-cover.html" class="nav-link" data-key="t-cover">
                          Cover </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="nav-item">
                  <a href="#sidebarLogout" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLogout" data-key="t-logout"> Logout
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarLogout">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-logout-basic.html" class="nav-link" data-key="t-basic"> Basic
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-logout-cover.html" class="nav-link" data-key="t-cover"> Cover
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarSuccessMsg" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSuccessMsg" data-key="t-success-message"> Success Message
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarSuccessMsg">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-success-msg-basic.html" class="nav-link" data-key="t-basic">
                          Basic </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-success-msg-cover.html" class="nav-link" data-key="t-cover">
                          Cover </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarTwoStep" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTwoStep" data-key="t-two-step-verification"> Two Step Verification
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarTwoStep">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-twostep-basic.html" class="nav-link" data-key="t-basic"> Basic
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-twostep-cover.html" class="nav-link" data-key="t-cover"> Cover
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarErrors" data-key="t-errors"> Errors
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarErrors">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="auth-404-basic.html" class="nav-link" data-key="t-404-basic"> 404
                          Basic </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-404-cover.html" class="nav-link" data-key="t-404-cover"> 404
                          Cover </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-404-alt.html" class="nav-link" data-key="t-404-alt"> 404 Alt
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-500.html" class="nav-link" data-key="t-500"> 500 </a>
                      </li>
                      <li class="nav-item">
                        <a href="auth-offline.html" class="nav-link" data-key="t-offline-page"> Offline Page </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
              <i class="ri-pages-line"></i> <span data-key="t-pages">Pages</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarPages">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="pages-starter.html" class="nav-link" data-key="t-starter"> Starter </a>
                </li>
                <li class="nav-item">
                  <a href="#sidebarProfile" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile" data-key="t-profile"> Profile
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarProfile">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="pages-profile.html" class="nav-link" data-key="t-simple-page">
                          Simple Page </a>
                      </li>
                      <li class="nav-item">
                        <a href="pages-profile-settings.html" class="nav-link" data-key="t-settings"> Settings </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="pages-team.html" class="nav-link" data-key="t-team"> Team </a>
                </li>
                <li class="nav-item">
                  <a href="pages-timeline.html" class="nav-link" data-key="t-timeline"> Timeline </a>
                </li>
                <li class="nav-item">
                  <a href="pages-faqs.html" class="nav-link" data-key="t-faqs"> FAQs </a>
                </li>
                <li class="nav-item">
                  <a href="pages-pricing.html" class="nav-link" data-key="t-pricing"> Pricing </a>
                </li>
                <li class="nav-item">
                  <a href="pages-gallery.html" class="nav-link" data-key="t-gallery"> Gallery </a>
                </li>
                <li class="nav-item">
                  <a href="pages-maintenance.html" class="nav-link" data-key="t-maintenance"> Maintenance
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages-coming-soon.html" class="nav-link" data-key="t-coming-soon"> Coming Soon
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages-sitemap.html" class="nav-link" data-key="t-sitemap"> Sitemap </a>
                </li>
                <li class="nav-item">
                  <a href="pages-search-results.html" class="nav-link" data-key="t-search-results"> Search Results </a>
                </li>
                <li class="nav-item">
                  <a href="pages-privacy-policy.html" class="nav-link" data-key="t-privacy-policy">Privacy Policy</a>
                </li>
                <li class="nav-item">
                  <a href="pages-term-conditions.html" class="nav-link" data-key="t-term-conditions">Term & Conditions</a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
              <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarLanding">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="landing.html" class="nav-link" data-key="t-one-page"> One Page </a>
                </li>
                <li class="nav-item">
                  <a href="nft-landing.html" class="nav-link" data-key="t-nft-landing"> NFT Landing </a>
                </li>
                <li class="nav-item">
                  <a href="job-landing.html" class="nav-link" data-key="t-job">Job</a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Components</span></li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
              <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-base-ui">Base UI</span>
            </a>
            <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
              <div class="row">
                <div class="col-lg-4">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="ui-alerts.html" class="nav-link" data-key="t-alerts">Alerts</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-badges.html" class="nav-link" data-key="t-badges">Badges</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-buttons.html" class="nav-link" data-key="t-buttons">Buttons</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-colors.html" class="nav-link" data-key="t-colors">Colors</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-cards.html" class="nav-link" data-key="t-cards">Cards</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-carousel.html" class="nav-link" data-key="t-carousel">Carousel</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-dropdowns.html" class="nav-link" data-key="t-dropdowns">Dropdowns</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-grid.html" class="nav-link" data-key="t-grid">Grid</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-4">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="ui-images.html" class="nav-link" data-key="t-images">Images</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-tabs.html" class="nav-link" data-key="t-tabs">Tabs</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-accordions.html" class="nav-link" data-key="t-accordion-collapse">Accordion & Collapse</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-modals.html" class="nav-link" data-key="t-modals">Modals</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-offcanvas.html" class="nav-link" data-key="t-offcanvas">Offcanvas</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-placeholders.html" class="nav-link" data-key="t-placeholders">Placeholders</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-progress.html" class="nav-link" data-key="t-progress">Progress</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-notifications.html" class="nav-link" data-key="t-notifications">Notifications</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-4">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="ui-media.html" class="nav-link" data-key="t-media-object">Media
                        object</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-embed-video.html" class="nav-link" data-key="t-embed-video">Embed
                        Video</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-typography.html" class="nav-link" data-key="t-typography">Typography</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-lists.html" class="nav-link" data-key="t-lists">Lists</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-links.html" class="nav-link"><span data-key="t-links">Links</span> <span class="badge badge-pill bg-success" data-key="t-new">New</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-general.html" class="nav-link" data-key="t-general">General</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-ribbons.html" class="nav-link" data-key="t-ribbons">Ribbons</a>
                    </li>
                    <li class="nav-item">
                      <a href="ui-utilities.html" class="nav-link" data-key="t-utilities">Utilities</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
              <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Advance UI</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="advance-ui-sweetalerts.html" class="nav-link" data-key="t-sweet-alerts">Sweet
                    Alerts</a>
                </li>
                <li class="nav-item">
                  <a href="advance-ui-nestable.html" class="nav-link" data-key="t-nestable-list">Nestable
                    List</a>
                </li>
                <li class="nav-item">
                  <a href="advance-ui-scrollbar.html" class="nav-link" data-key="t-scrollbar">Scrollbar</a>
                </li>
                <li class="nav-item">
                  <a href="advance-ui-animation.html" class="nav-link" data-key="t-animation">Animation</a>
                </li>
                <li class="nav-item">
                  <a href="advance-ui-tour.html" class="nav-link" data-key="t-tour">Tour</a>
                </li>
                <li class="nav-item">
                  <a href="advance-ui-swiper.html" class="nav-link" data-key="t-swiper-slider">Swiper
                    Slider</a>
                </li>
                <li class="nav-item">
                  <a href="advance-ui-ratings.html" class="nav-link" data-key="t-ratings">Ratings</a>
                </li>
                <li class="nav-item">
                  <a href="advance-ui-highlight.html" class="nav-link" data-key="t-highlight">Highlight</a>
                </li>
                <li class="nav-item">
                  <a href="advance-ui-scrollspy.html" class="nav-link" data-key="t-scrollSpy">ScrollSpy</a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="widgets.html">
              <i class="ri-honour-line"></i> <span data-key="t-widgets">Widgets</span>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
              <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Forms</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarForms">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="forms-elements.html" class="nav-link" data-key="t-basic-elements">Basic
                    Elements</a>
                </li>
                <li class="nav-item">
                  <a href="forms-select.html" class="nav-link" data-key="t-form-select"> Form Select </a>
                </li>
                <li class="nav-item">
                  <a href="forms-checkboxs-radios.html" class="nav-link" data-key="t-checkboxs-radios">Checkboxs & Radios</a>
                </li>
                <li class="nav-item">
                  <a href="forms-pickers.html" class="nav-link" data-key="t-pickers"> Pickers </a>
                </li>
                <li class="nav-item">
                  <a href="forms-masks.html" class="nav-link" data-key="t-input-masks">Input Masks</a>
                </li>
                <li class="nav-item">
                  <a href="forms-advanced.html" class="nav-link" data-key="t-advanced">Advanced</a>
                </li>
                <li class="nav-item">
                  <a href="forms-range-sliders.html" class="nav-link" data-key="t-range-slider"> Range
                    Slider </a>
                </li>
                <li class="nav-item">
                  <a href="forms-validation.html" class="nav-link" data-key="t-validation">Validation</a>
                </li>
                <li class="nav-item">
                  <a href="forms-wizard.html" class="nav-link" data-key="t-wizard">Wizard</a>
                </li>
                <li class="nav-item">
                  <a href="forms-editors.html" class="nav-link" data-key="t-editors">Editors</a>
                </li>
                <li class="nav-item">
                  <a href="forms-file-uploads.html" class="nav-link" data-key="t-file-uploads">File
                    Uploads</a>
                </li>
                <li class="nav-item">
                  <a href="forms-layouts.html" class="nav-link" data-key="t-form-layouts">Form Layouts</a>
                </li>
                <li class="nav-item">
                  <a href="forms-select2.html" class="nav-link" data-key="t-select2">Select2</a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
              <i class="ri-layout-grid-line"></i> <span data-key="t-tables">Tables</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarTables">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="tables-basic.html" class="nav-link" data-key="t-basic-tables">Basic Tables</a>
                </li>
                <li class="nav-item">
                  <a href="tables-gridjs.html" class="nav-link" data-key="t-grid-js">Grid Js</a>
                </li>
                <li class="nav-item">
                  <a href="tables-listjs.html" class="nav-link" data-key="t-list-js">List Js</a>
                </li>
                <li class="nav-item">
                  <a href="tables-datatables.html" class="nav-link" data-key="t-datatables">Datatables</a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
              <i class="ri-pie-chart-line"></i> <span data-key="t-charts">Charts</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarCharts">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="#sidebarApexcharts" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApexcharts" data-key="t-apexcharts">
                    Apexcharts
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarApexcharts">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="charts-apex-line.html" class="nav-link" data-key="t-line"> Line
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-area.html" class="nav-link" data-key="t-area"> Area
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-column.html" class="nav-link" data-key="t-column">
                          Column </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-bar.html" class="nav-link" data-key="t-bar"> Bar </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-mixed.html" class="nav-link" data-key="t-mixed"> Mixed
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-timeline.html" class="nav-link" data-key="t-timeline">
                          Timeline </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-range-area.html" class="nav-link"><span data-key="t-range-area">Range Area</span> <span class="badge badge-pill bg-success" data-key="t-new">New</span></a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-funnel.html" class="nav-link"><span data-key="t-funnel">Funnel</span> <span class="badge badge-pill bg-success" data-key="t-new">New</span></a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-candlestick.html" class="nav-link" data-key="t-candlstick"> Candlstick </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-boxplot.html" class="nav-link" data-key="t-boxplot">
                          Boxplot </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-bubble.html" class="nav-link" data-key="t-bubble">
                          Bubble </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-scatter.html" class="nav-link" data-key="t-scatter">
                          Scatter </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-heatmap.html" class="nav-link" data-key="t-heatmap">
                          Heatmap </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-treemap.html" class="nav-link" data-key="t-treemap">
                          Treemap </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-pie.html" class="nav-link" data-key="t-pie"> Pie </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-radialbar.html" class="nav-link" data-key="t-radialbar"> Radialbar </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-radar.html" class="nav-link" data-key="t-radar"> Radar
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="charts-apex-polar.html" class="nav-link" data-key="t-polar-area">
                          Polar Area </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="charts-chartjs.html" class="nav-link" data-key="t-chartjs"> Chartjs </a>
                </li>
                <li class="nav-item">
                  <a href="charts-echarts.html" class="nav-link" data-key="t-echarts"> Echarts </a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
              <i class="ri-compasses-2-line"></i> <span data-key="t-icons">Icons</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarIcons">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="icons-remix.html" class="nav-link"><span data-key="t-remix">Remix</span> <span class="badge badge-pill bg-info">v3.6</span></a>
                </li>
                <li class="nav-item">
                  <a href="icons-boxicons.html" class="nav-link"><span data-key="t-boxicons">Boxicons</span> <span class="badge badge-pill bg-info">v2.1.4</span></a>
                </li>
                <li class="nav-item">
                  <a href="icons-materialdesign.html" class="nav-link"><span data-key="t-material-design">Material Design</span> <span class="badge badge-pill bg-info">v7.2.96</span></a>
                </li>
                <li class="nav-item">
                  <a href="icons-lineawesome.html" class="nav-link" data-key="t-line-awesome">Line Awesome</a>
                </li>
                <li class="nav-item">
                  <a href="icons-feather.html" class="nav-link"><span data-key="t-feather">Feather</span> <span class="badge badge-pill bg-info">v4.29.1</span></a>
                </li>
                <li class="nav-item">
                  <a href="icons-crypto.html" class="nav-link"> <span data-key="t-crypto-svg">Crypto SVG</span></a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaps">
              <i class="ri-map-pin-line"></i> <span data-key="t-maps">Maps</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarMaps">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="maps-google.html" class="nav-link" data-key="t-google">
                    Google
                  </a>
                </li>
                <li class="nav-item">
                  <a href="maps-vector.html" class="nav-link" data-key="t-vector">
                    Vector
                  </a>
                </li>
                <li class="nav-item">
                  <a href="maps-leaflet.html" class="nav-link" data-key="t-leaflet">
                    Leaflet
                  </a>
                </li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
              <i class="ri-share-line"></i> <span data-key="t-multi-level">Multi Level</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarMultilevel">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                </li>
                <li class="nav-item">
                  <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level
                    1.2
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarAccount">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                      </li>
                      <li class="nav-item">
                        <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm" data-key="t-level-2.2"> Level 2.2
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCrm">
                          <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                              <a href="#" class="nav-link" data-key="t-level-3.1"> Level 3.1
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link" data-key="t-level-3.2"> Level 3.2
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li> -->

        </ul>
      </div>
      <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
  </div>

  <!-- Begin page -->
  <div class="layout-wrapper">
    <!-- start header -->
    <section class="py-5 bg-primary position-relative">
      <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
      <div class="container">
        <div class="row align-items-center gy-4">
          <div class="col-sm">
            <div>
              <h4 class="text-white fw-semibold">
                Form Pendaftaran Kandidat
              </h4>
              <p class="text-white text-opacity-75 mb-0">Cakrawala Group</p>
            </div>
          </div>
          <!-- end col -->
          <div class="col-sm-auto">
            <button class="btn btn-danger" type="button">
              Open Website <i class="ri-arrow-right-line align-bottom"></i>
            </button>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end header -->

    <!-- testing -->
    <!-- <pre>
      <?php //print_r($all_project);
      ?>
    </pre> -->

    <!-- ============================================================== -->
    <!-- Start Form Pendaftaran -->
    <!-- ============================================================== -->
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 id="header_navigasi" class="card-title mb-0">Cakrawala Group</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
              <form action="#" class="form-steps" autocomplete="off">
                <div
                  id="logo_navigasi"
                  class="text-center pt-3 pb-4 mb-1 d-flex justify-content-center">
                  <img src="<?php echo base_url('assets/images/logo/logo_cakrawala.png'); ?>" class="card-logo mx-1" alt="logo dark" height="50" />
                  <img src="<?php echo base_url('assets/images/logo/logo_kac.png'); ?>" class="card-logo mx-1" alt="logo dark" height="50" />
                  <img src="<?php echo base_url('assets/images/logo/logo_mata.png'); ?>" class="card-logo mx-1" alt="logo dark" height="50" />
                </div>
                <div class="step-arrow-nav mb-4">
                  <ul

                    id="navigasi_section"
                    class="nav nav-pills custom-nav nav-justified"
                    role="tablist">
                    <li hidden class="nav-item" role="presentation">
                      <button
                        class="nav-link active"
                        id="perusahaan-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#perusahaan"
                        type="button"
                        role="tab"
                        aria-controls="perusahaan"
                        aria-selected="true">
                        PERUSAHAAN
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button

                        class="nav-link active"
                        id="project-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#project"
                        type="button"
                        role="tab"
                        aria-controls="project"
                        aria-selected="true">
                        PROJECT
                      </button>
                    </li>
                    <li disabled id="data_diri_nav_tab" class="nav-item" role="presentation">
                      <button
                        disabled
                        class="nav-link"
                        id="data-diri-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#data-diri"
                        type="button"
                        role="tab"
                        aria-controls="data-diri"
                        aria-selected="true">
                        DATA DIRI
                      </button>
                    </li>
                    <li disabled id="pengalaman_nav_tab" class="nav-item" role="presentation">
                      <button
                        disabled
                        class="nav-link"
                        id="pengalaman-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pengalaman"
                        type="button"
                        role="tab"
                        aria-controls="pengalaman"
                        aria-selected="false">
                        PENGALAMAN KERJA
                      </button>
                    </li>
                    <li disabled id="dokumen_nav_tab" class="nav-item" role="presentation">
                      <button
                        disabled
                        class="nav-link"
                        id="dokumen-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#dokumen"
                        type="button"
                        role="tab"
                        aria-controls="dokumen"
                        aria-selected="false">
                        DOKUMEN
                      </button>
                    </li>
                    <li disabled id="finish_nav_tab" class="nav-item" role="presentation">
                      <button
                        disabled
                        class="nav-link"
                        id="finish-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#finish"
                        type="button"
                        role="tab"
                        aria-controls="finish"
                        aria-selected="false">
                        SELESAI
                      </button>
                    </li>
                  </ul>
                </div>

                <div class="tab-content">
                  <!-- TAB Perusahaan -->
                  <div
                    class="tab-pane fade"
                    id="perusahaan"
                    role="tabpanel"
                    aria-labelledby="nik-ktp-tab">
                    <div>
                      <div class="row">
                        <div class="col-12 col-md-12 text-center align-self-center">
                          <h4>Silahkan pilih perusahaan yang dilamar:</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 text-center align-self-center">
                          <span id="button_cakrawala"><button onclick="next_perusahaan(1)" type='button' class='btn btn-outline-light m-2'><img src="<?php echo base_url('assets/images/logo/logo_cakrawala.png'); ?>" alt="" height="100px"></button></span>
                          <span id="button_kac"><button onclick="next_perusahaan(2)" type='button' class='btn btn-outline-light m-2'><img src="<?php echo base_url('assets/images/logo/logo_kac.png'); ?>" alt="" height="100px"></button></span>
                          <span id="button_mata"><button onclick="next_perusahaan(3)" type='button' class='btn btn-outline-light m-2'><img src="<?php echo base_url('assets/images/logo/logo_mata.png'); ?>" alt="" height="100px"></button></span>
                          <input hidden id="id_kandidat" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 mt-4">
                      <!-- white space -->
                    </div>
                  </div>
                  <!-- end tab Perusahaan -->

                  <!-- TAB Project -->
                  <div
                    class="tab-pane fade show active"
                    id="project"
                    role="tabpanel"
                    aria-labelledby="project-tab">
                    <div>
                      <div class="row">
                        <div hidden class="mb-3">
                          <label
                            class="form-label"
                            for="perusahaan_input">Perusahaan</label>
                          <select name="perusahaan_input" id="perusahaan_input" class="form-control dropdown-dengan-search">
                            <option value="">Pilih Perusahaan</option>
                            <?php foreach ($all_company as $company) : ?>
                              <option value="<?= $company['id']; ?>" style="text-wrap: wrap;">
                                <?php echo $company['nama']; ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                          <input hidden id="perusahaan_id_selected" type="text">
                          <input hidden id="perusahaan_name_selected" type="text">
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label
                              class="form-label"
                              for="project_input">
                              Project
                            </label>
                            <select name="project_input" id="project_input" class="form-control dropdown-dengan-search">
                              <option value="">Pilih Project</option>
                              <?php foreach ($all_project as $project) : ?>
                                <option value="<?= $project['project_id']; ?>" style="text-wrap: wrap;">
                                  <?php echo "[" . $project['priority'] . "] " . $project['title']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label
                              class="form-label"
                              for="jabatan_input">Posisi/Jabatan</label>
                            <select name="jabatan_input" id="jabatan_input" class="form-control dropdown-dengan-search">
                              <option value="" style="text-wrap: wrap;">Pilih Jabatan</option>
                              <?php foreach ($all_jabatan as $jabatan) : ?>
                                <option value="<?= $jabatan['designation_id']; ?>" style="text-wrap: wrap;">
                                  <?php echo $jabatan['designation_name']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label
                              class="form-label"
                              for="provinsi_input">
                              Provinsi
                            </label>
                            <select name="provinsi_input" id="provinsi_input" class="form-control dropdown-dengan-search">
                              <option value="">Pilih Provinsi</option>
                              <?php foreach ($all_provinsi as $provinsi) : ?>
                                <option value="<?= $provinsi['id_bps']; ?>" style="text-wrap: wrap;">
                                  <?php echo $provinsi['nama']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label
                              class="form-label"
                              for="kota_input">Area</label>
                            <select name="kota_input" id="kota_input" class="form-control dropdown-dengan-search">
                              <option value="" style="text-wrap: wrap;">Pilih Area</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label
                          class="form-label"
                          for="sumber_info_input">Sumber Info</label>
                        <select name="sumber_info_input" id="sumber_info_input" class="form-control dropdown-dengan-search">
                          <option value="" style="text-wrap: wrap;">Pilih Sumber Info</option>
                          <?php foreach ($all_sumber_info as $info) : ?>
                            <option value="<?= $info['id']; ?>" style="text-wrap: wrap;">
                              <?php echo $info['nama']; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label
                          class="form-label"
                          for="interviewer_input">Bertemu Dengan</label>
                        <select name="interviewer_input" id="interviewer_input" class="form-control dropdown-dengan-search">
                          <option value="" style="text-wrap: wrap;">Pilih Bertemu Dengan</option>
                          <?php foreach ($all_interviewer as $interviewer) : ?>
                            <option value="<?= $interviewer['id']; ?>" style="text-wrap: wrap;">
                              <?php echo $interviewer['nama'] . " - " . $interviewer['jabatan'] . " - " . $interviewer['area']; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 mt-4">
                      <button
                        type="button"
                        onclick="next_project()"
                        class="btn btn-success btn-label right ms-auto">
                        <i
                          class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next
                      </button>
                    </div>
                  </div>
                  <!-- end project tab pane -->

                  <!-- TAB Data Diri -->
                  <div
                    class="tab-pane fade"
                    id="data-diri"
                    role="tabpanel"
                    aria-labelledby="data-diri-tab">
                    <form class="g-3">
                      <div class="row">
                        <div class="mb-3">
                          <label for="nik_ktp" class="form-label">NIK KTP</label>
                          <input type="text" class="form-control" placeholder="Nomor Induk Kependudukan" id="nik_ktp" value="" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">NAMA LENGKAP</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama_lengkap" value="" required>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">JENIS KELAMIN</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control dropdown-dengan-search" required>
                              <option value="" style="text-wrap: wrap;">Pilih Jenis Kelamin</option>
                              <option value="L" style="text-wrap: wrap;">Laki-Laki</option>
                              <option value="P" style="text-wrap: wrap;">Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">TEMPAT LAHIR</label>
                            <input type="text" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir" value="" required>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">TANGGAL LAHIR</label>
                            <input type="text" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" data-provider="flatpickr" data-date-format="Y-m-d">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3">
                          <label for="asal_kota" class="form-label">ASAL KOTA PELAMAR (CONTOH : CIREBON, JAWA BARAT)</label>
                          <input type="text" class="form-control" placeholder="Asal Kota Domisili" id="asal_kota" value="" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3">
                          <label for="alamat_domisili" class="form-label">ALAMAT LENGKAP</label>
                          <textarea class="form-control" id="alamat_domisili" placeholder="Alamat Domisili" rows="3" required></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3">
                          <label for="no_hp" class="form-label">NOMOR TELEPON / WHATSAPP</label>
                          <input type="text" class="form-control" placeholder="Nomor Telepon / Whatsapp" id="no_hp" value="" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="nama_kondar" class="form-label">NAMA KONTAK DARURAT</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap Kontak Darurat" id="nama_kondar" value="" required>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="hubungan_kondar" class="form-label">HUBUNGAN KONTAK DARURAT</label>
                            <select name="hubungan_kondar" id="hubungan_kondar" class="form-control dropdown-dengan-search">
                              <option value="" style="text-wrap: wrap;">Pilih Hubungan Kontak Darurat</option>
                              <?php foreach ($all_family_relation as $family_relation) : ?>
                                <option value="<?= $family_relation['secid']; ?>" style="text-wrap: wrap;">
                                  <?php echo $family_relation['name']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                            <!-- <select name="hubungan_kondar" id="hubungan_kondar" class="form-control dropdown-dengan-search" required>
                              <option value="" style="text-wrap: wrap;">Pilih Hubungan Kontak Darurat</option>
                              <option value="1" style="text-wrap: wrap;">Orang Tua</option>
                              <option value="2" style="text-wrap: wrap;">Kakak</option>
                              <option value="3" style="text-wrap: wrap;">Adik</option>
                              <option value="4" style="text-wrap: wrap;">Paman</option>
                              <option value="5" style="text-wrap: wrap;">Bibi</option>
                              <option value="6" style="text-wrap: wrap;">Sepupu</option>
                              <option value="7" style="text-wrap: wrap;">Keponakan</option>
                              <option value="8" style="text-wrap: wrap;">Lainnya</option>
                            </select> -->
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label for="nomor_kondar" class="form-label">NOMOR TELEPON KONTAK DARURAT</label>
                            <input type="text" class="form-control" placeholder="Nomor Telepon Kontak Darurat" id="nomor_kondar" value="" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3">
                          <label for="status_nikah" class="form-label">STATUS MENIKAH</label>
                          <select name="status_nikah" id="status_nikah" class="form-control dropdown-dengan-search" required>
                            <option value="" style="text-wrap: wrap;">Pilih Status Menikah</option>
                            <option value="TK/0" style="text-wrap: wrap;">Belum Menikah</option>
                            <option value="TK/0" style="text-wrap: wrap;">Janda/Duda (0 Anak)</option>
                            <option value="TK/1" style="text-wrap: wrap;">Janda/Duda (1 Anak)</option>
                            <option value="TK/2" style="text-wrap: wrap;">Janda/Duda (2 Anak)</option>
                            <option value="TK/3" style="text-wrap: wrap;">Janda/Duda (3 Anak atau lebih)</option>
                            <option value="K/0" style="text-wrap: wrap;">Menikah (0 Anak)</option>
                            <option value="K/1" style="text-wrap: wrap;">Menikah (1 Anak)</option>
                            <option value="K/2" style="text-wrap: wrap;">Menikah (2 Anak)</option>
                            <option value="K/3" style="text-wrap: wrap;">Menikah (3 Anak atau lebih)</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="d-flex align-items-start gap-3 mt-4">
                          <button
                            type="button"
                            onclick="previous_data_diri()"
                            class="btn btn-light btn-label">
                            <i
                              class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                            Back to Project
                          </button>
                          <button
                            type="button"
                            onclick="next_data_diri()"
                            class="btn btn-success btn-label right ms-auto">
                            <i
                              class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- end data diri tab pane -->

                  <!-- TAB Pengalaman -->
                  <div
                    class="tab-pane fade"
                    id="pengalaman"
                    role="tabpanel"
                    aria-labelledby="pengalaman-tab">
                    <form class="g-3">
                      <div class="row">
                        <div class="mb-3">
                          <label for="pengalaman_kerja" class="form-label">PENGALAMAN KERJA</label></br>
                          <small for="pengalaman_kerja" class="form-label" style="color:red">ISI DENGAN 3 PENGALAMAN KERJA TERAKHIR. CONTOH:</small></br>
                          <small for="pengalaman_kerja" class="form-label" style="color:red">1. FINISAR MALAYSIA MANUFACTURING</small></br>
                          <small for="pengalaman_kerja" class="form-label" style="color:red">2. PT PERMODALAN NASIONAL MADANI</small></br>
                          <small for="pengalaman_kerja" class="form-label" style="color:red">3. PT NIAGA INDOGUNA YASA</small></br>
                          <textarea class="form-control" id="pengalaman_kerja" placeholder="Pengalaman Kerja" rows="3" required></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3">
                          <label for="kontak_person_sebelumnya" class="form-label">CONTACT PERSON PT / PERUSAHAAN / ATASAN SEBELUMNYA ( MINIMAL 2)</label></br>
                          <small for="kontak_person_sebelumnya" class="form-label" style="color:red">CONTOH:</small></br>
                          <small for="kontak_person_sebelumnya" class="form-label" style="color:red">1. PT NIAGA INDOGUNA YASA, BAPAK DIMAS 082298738904</small></br>
                          <small for="kontak_person_sebelumnya" class="form-label" style="color:red">2. PT FINISAR MALAYSIA MANUFACTURING, IBU LELI 098776543277</small></br>
                          <textarea class="form-control" id="kontak_person_sebelumnya" placeholder="Contact Person" rows="3" required></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="d-flex align-items-start gap-3 mt-4">
                          <button
                            type="button"
                            onclick="previous_pengalaman()"
                            class="btn btn-light btn-label">
                            <i
                              class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                            Back to Data Diri
                          </button>
                          <button
                            type="button"
                            onclick="next_pengalaman()"
                            class="btn btn-success btn-label right ms-auto">
                            <i
                              class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- end pengalaman tab pane -->

                  <!-- TAB Dokumen -->
                  <div
                    class="tab-pane fade"
                    id="dokumen"
                    role="tabpanel"
                    aria-labelledby="dokumen-tab">
                    <div class="row mt-2">
                      <div class="col-lg-12">
                        <!-- <div class="justify-content-between d-flex align-items-center mb-3">
                          <h5 class="mb-0 pb-1 text-decoration-underline">Filepond</h5>
                        </div> -->

                        <div class="row">
                          <!-- FILE FOTO -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">PAS FOTO (TERBARU)</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="pas_foto" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                                <input hidden type="text" id="status_file_pasfoto" value="0">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                          <!-- FILE KTP -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE KTP</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_ktp" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                                <input hidden type="text" id="status_file_ktp" value="0">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                          <!-- FILE CV -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE CV</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 10 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_cv" data-allow-reorder="true" data-max-file-size="10MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                                <input hidden type="text" id="status_file_cv" value="0">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                          <!-- FILE KK -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE KK</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_kk" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                          <!-- FILE NPWP -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE NPWP</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_npwp" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                          <!-- FILE SKCK -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE SKCK</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_skck" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                          <!-- FILE IJAZAH -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE IJAZAH</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_ijazah" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                                <input hidden type="text" id="status_file_ijazah" value="0">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                          <!-- FILE SIM -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE SIM A / C</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_sim" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                          <!-- FILE PAKLARING -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE PAKLARING</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_paklaring" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                          <!-- FILE DOKUMEN PENDUKUNG -->
                          <div class="col-lg-3">
                            <div class="card">
                              <div class="card-header">
                                <h4 class="card-title mb-0">FILE DOKUMEN PENDUKUNG</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                <small class="text-muted">File bertipe jpg, jpeg, png atau pdf. Ukuran maksimal 5 MB</small>
                                <input type="file" class="filepond filepond-input-multiple" multiple id="file_dokumen_pendukung" data-allow-reorder="true" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, application/pdf">
                              </div>
                              <!-- end card body -->
                            </div>
                            <!-- end card -->
                          </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                      </div>
                      <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="d-flex align-items-start gap-3 mt-4">
                      <button
                        type="button"
                        onclick="previous_dokumen()"
                        class="btn btn-light btn-label"
                        data-previous="data-diri-tab">
                        <i
                          class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                        Back to Pengalaman Kerja
                      </button>
                      <button
                        type="button"
                        id="button_next_dokumen"
                        onclick="next_dokumen()"
                        class="btn btn-success btn-label right ms-auto">
                        <i
                          class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next
                      </button>
                    </div>
                  </div>
                  <!-- end tab pane -->

                  <div
                    class="tab-pane fade"
                    id="finish"
                    role="tabpanel">
                    <div class="text-center">
                      <div class="avatar-md mt-5 mb-4 mx-auto">
                        <div
                          class="avatar-title bg-light text-success display-4 rounded-circle">
                          <i class="ri-checkbox-circle-fill"></i>
                        </div>
                      </div>
                      <h5>Selamat !</h5>
                      <p class="text-muted">
                        Anda berhasil melakukan registrasi pelamar
                      </p>
                      <h5>Nomor Registrasi Anda: <span id="nomor_registrasi"></h5>
                      <h5>Waktu Registrasi Anda: <span id="waktu_registrasi"></h5>
                    </div>
                  </div>
                  <!-- end tab pane -->
                </div>
                <!-- end tab content -->
              </form>
            </div>
            <!-- end card body -->
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- container-fluid -->

    <!-- Start footer -->
    <footer class="custom-footer bg-dark py-5 position-relative">
      <div class="container">
        <div class="row text-center text-sm-start align-items-center mt-1">
          <div class="col-sm-6">
            <div>
              <p class="copy-rights mb-0">
                <script>
                  document.write(new Date().getFullYear());
                </script>
                © Cakrawala Group
              </p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="text-sm-end mt-3 mt-sm-0">
              <ul class="list-inline mb-0 footer-list gap-4 fs-13">
                <li class="list-inline-item">
                  <a href="#">Privacy Policy</a>
                </li>
                <li class="list-inline-item">
                  <a href="#">Terms & Conditions</a>
                </li>
                <li class="list-inline-item">
                  <a href="#">Security</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end footer -->

    <!--start back-to-top-->
    <button
      onclick="topFunction()"
      class="btn btn-info btn-icon landing-back-top"
      id="back-to-top">
      <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
  </div>
  <!-- end layout wrapper -->

  <!-- JAVASCRIPT -->
  <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
  <script src="<?= base_url() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins.js"></script>

  <!--Swiper slider js-->
  <script src="<?= base_url() ?>assets/libs/swiper/swiper-bundle.min.js"></script>

  <!--job landing init -->
  <!-- <script src="<?= base_url() ?>assets/js/pages/job-lading.init.js"></script> -->

  <!-- App js -->
  <script src="<?= base_url() ?>assets/js/pages/form-wizard.init.js"></script>

  <!-- prismjs plugin -->
  <script src="<?= base_url() ?>assets/libs/prismjs/prism.js"></script>

  <!-- <script src="<?= base_url() ?>assets/js/pages/form-validation.init.js"></script> -->

  <!-- dropzone min -->
  <!-- <script src="assets/libs/dropzone/dropzone-min.js"></script> -->
  <!-- filepond js -->
  <script src="assets/libs/filepond/filepond.min.js"></script>
  <script src="assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
  <script src="assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
  <script src="assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
  <script src="assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>
  <script src="assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.js"></script>
  <script src="assets/libs/filepond-plugin-file-rename/filepond-plugin-file-rename.js"></script>
  <!-- <script src="assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.js"></script> -->

  <!-- <script src="assets/js/pages/form-file-upload.init.js"></script> -->

  <!-- Modern colorpicker bundle -->
  <script src="assets/libs/%40simonwep/pickr/pickr.min.js"></script>
  <script src="<?= base_url() ?>assets/js/pages/form-pickers.init.js"></script>

  <script src="assets/js/app.js"></script>

  <script>
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
      csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    FilePond.registerPlugin(
      FilePondPluginFileEncode,
      FilePondPluginFileValidateType,
      FilePondPluginFileValidateSize,
      FilePondPluginFileRename,
      // FilePondPluginImageEdit,
      FilePondPluginImageExifOrientation,
      FilePondPluginImagePreview
    );

    //create object filepond untuk pasfoto
    var pond_pasfoto = FilePond.create(document.querySelector('input[id="pas_foto"]'), {
      labelIdle: 'Drag & Drop pas foto anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `pasfoto${file.extension}`;
      }
    });

    //create object filepond untuk ktp
    var pond_ktp = FilePond.create(document.querySelector('input[id="file_ktp"]'), {
      labelIdle: 'Drag & Drop file ktp anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `ktp${file.extension}`;
      }
    });

    //create object filepond untuk cv
    var pond_cv = FilePond.create(document.querySelector('input[id="file_cv"]'), {
      labelIdle: 'Drag & Drop file CV anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "10MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `cv${file.extension}`;
      }
    });

    //create object filepond untuk kk
    var pond_kk = FilePond.create(document.querySelector('input[id="file_kk"]'), {
      labelIdle: 'Drag & Drop file Kartu Keluarga anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `kk${file.extension}`;
      }
    });

    //create object filepond untuk npwp
    var pond_npwp = FilePond.create(document.querySelector('input[id="file_npwp"]'), {
      labelIdle: 'Drag & Drop file NPWP anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `npwp${file.extension}`;
      }
    });

    //create object filepond untuk skck
    var pond_skck = FilePond.create(document.querySelector('input[id="file_skck"]'), {
      labelIdle: 'Drag & Drop file SKCK anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `skck${file.extension}`;
      }
    });

    //create object filepond untuk ijazah
    var pond_ijazah = FilePond.create(document.querySelector('input[id="file_ijazah"]'), {
      labelIdle: 'Drag & Drop file Ijazah anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `ijazah${file.extension}`;
      }
    });

    //create object filepond untuk sim
    var pond_sim = FilePond.create(document.querySelector('input[id="file_sim"]'), {
      labelIdle: 'Drag & Drop file SIM anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `sim${file.extension}`;
      }
    });

    //create object filepond untuk paklaring
    var pond_paklaring = FilePond.create(document.querySelector('input[id="file_paklaring"]'), {
      labelIdle: 'Drag & Drop file Paklaring anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `paklaring${file.extension}`;
      }
    });

    //create object filepond untuk dokumen_pendukung
    var pond_dokumen_pendukung = FilePond.create(document.querySelector('input[id="file_dokumen_pendukung"]'), {
      labelIdle: 'Drag & Drop file Dokumen Pendukung anda atau <span class="filepond--label-action">Browse</span>',
      imagePreviewHeight: 170,
      maxFileSize: "5MB",
      acceptedFileTypes: ['image/png', 'image/jpeg', 'application/pdf'],
      imageCropAspectRatio: "1:1",
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200,
      fileRenameFunction: (file) => {
        return `dokumen_pendukung${file.extension}`;
      }
    });
  </script>

  <!-- define dropdown dengan search -->
  <script type='text/javascript'>
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
      csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $(document).ready(function() {
      $('.dropdown-dengan-search').select2({
        width: '100%'
      });
    });

    // Provinsi Change - Kota
    $('#provinsi_input').change(function() {
      var provinsi = $(this).val();

      // AJAX request Kota
      $.ajax({
        url: '<?= base_url() ?>registrasi/getKotaByProv/',
        method: 'post',
        data: {
          [csrfName]: csrfHash,
          provinsi: provinsi,
        },
        dataType: 'json',
        success: function(response) {

          // Remove options
          $('#kota_input').find('option').not(':first').remove();

          // Add options
          $.each(response, function(index, data) {
            $('#kota_input').append('<option value="' + data['id'] + '" style="text-wrap: wrap;">' + data['nama'] + '</option>');
          });
        }
      });
    });
  </script>

  <!-- button next perusahaan -->
  <script>
    function next_perusahaan(id) {
      // AJAX untuk save data perusahaan
      $.ajax({
        url: '<?= base_url() ?>registrasi/save_perusahaan/',
        method: 'post',
        data: {
          [csrfName]: csrfHash,
          perusahaan_id: id,
        },
        beforeSend: function() {},
        success: function(response) {
          var res = jQuery.parseJSON(response);

          //append id_kandidat ke objek filepond
          pond_pasfoto.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_ktp.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_cv.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_kk.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_npwp.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_skck.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_ijazah.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_sim.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_paklaring.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });
          pond_dokumen_pendukung.setOptions({
            server: {
              process: {
                url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                method: 'POST',
                ondata: (formData) => {
                  formData.append('id_kandidat', res);
                  formData.append([csrfName], csrfHash);
                  return formData;
                }
              }
            }
          });

          if (id == 1) {
            nama_perusahaan = 'PT. Siprama Cakrawala';
            card_logo = '<img src="<?php echo base_url('assets/images/logo/logo_cakrawala.png'); ?>" class="card-logo" alt="logo dark" height="50" />';
          } else if (id == 2) {
            nama_perusahaan = 'PT. Krista Aulia Cakrawala';
            card_logo = '<img src="<?php echo base_url('assets/images/logo/logo_kac.png'); ?>" class="card-logo" alt="logo dark" height="50" />';
          } else if (id == 3) {
            nama_perusahaan = 'PT. Mata Cakrawala';
            card_logo = '<img src="<?php echo base_url('assets/images/logo/logo_mata.png'); ?>" class="card-logo" alt="logo dark" height="50" />';
          }
          $("#perusahaan_input").val(id).change();
          $('#perusahaan_input').prop('disabled', 'disabled');
          $("#project-tab").removeAttr('disabled');
          $("#id_kandidat").val(res);
          $("#nomor_registrasi").html(res);
          $("#perusahaan_id_selected").val(id);
          var nama_perusahaan_option = $("#perusahaan_input option:selected").text();
          $("#perusahaan_name_selected").val(nama_perusahaan_option);

          $('#logo_navigasi').html(card_logo);
          $('#header_navigasi').html(nama_perusahaan);
          $('#navigasi_section').attr("hidden", false);
          $('#logo_navigasi').attr("hidden", false);
          $('#header_navigasi').attr("hidden", false);
          $('.card-header').attr("hidden", false);
          $('#perusahaan-tab').removeClass('active');
          $('#perusahaan-tab').addClass('done');
          $('#project-tab').addClass('active');
          $('#perusahaan').removeClass('active');
          $('#perusahaan').removeClass('show');
          $('#project').addClass('active');
          $('#project').addClass('show');
        },
        error: function(xhr, status, error) {
          alert("error save perusahaan");
        }
      });

    }
  </script>

  <!-- button next project -->
  <script>
    function next_project() {
      var project_id = $("#project_input").val();
      var project_name = $("#project_input option:selected").text();
      var jabatan_id = $("#jabatan_input").val();
      var jabatan_name = $("#jabatan_input option:selected").text();
      var area = $("#kota_input").val();
      var sumber_info = $("#sumber_info_input").val();
      var interviewer = $("#interviewer_input").val();

      if (
        area == "" || area == "0" || area == null ||
        sumber_info == "" || sumber_info == "0" || sumber_info == null ||
        interviewer == "" || interviewer == "0" || interviewer == null
      ) {
        alert("Area, Sumber Info dan Bertemu dengan harus diisi.");
      } else {
        if (project_id == "") {
          project_name = "";
        }
        if (jabatan_id == "") {
          jabatan_name = "";
        }
        // AJAX untuk save data diri
        $.ajax({
          url: '<?= base_url() ?>registrasi/save_project/',
          method: 'post',
          data: {
            [csrfName]: csrfHash,
            project_id: project_id,
            project_name: project_name,
            jabatan_id: jabatan_id,
            jabatan_name: jabatan_name,
            area: area,
            sumber_info: sumber_info,
            interviewer: interviewer,
          },
          beforeSend: function() {},
          success: function(response) {
            var res = jQuery.parseJSON(response);

            //append id_kandidat ke objek filepond
            pond_pasfoto.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_ktp.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_cv.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_kk.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_npwp.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_skck.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_ijazah.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_sim.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_paklaring.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });
            pond_dokumen_pendukung.setOptions({
              server: {
                process: {
                  url: '<?php echo base_url() ?>Registrasi/upload_dokumen',
                  method: 'POST',
                  ondata: (formData) => {
                    formData.append('id_kandidat', res);
                    formData.append([csrfName], csrfHash);
                    return formData;
                  }
                }
              }
            });

            $("#id_kandidat").val(res);
            $("#nomor_registrasi").html(res);

            // alert(id);
            $('#project-tab').prop('disabled', 'disabled');
            $("#data-diri-tab").removeAttr('disabled');
            $('#project-tab').removeClass('active');
            $('#project-tab').addClass('done');
            $('#data-diri-tab').addClass('active');
            $('#project').removeClass('active');
            $('#project').removeClass('show');
            $('#data-diri').addClass('active');
            $('#data-diri').addClass('show');
          },
          error: function(xhr, status, error) {
            alert("error save project");
          }
        });
      }

    }
  </script>

  <!-- button previous data diri -->
  <script>
    function previous_data_diri() {
      $('#data-diri-tab').removeClass('active');
      $('#data-diri-tab').removeClass('done');
      $('#data-diri-tab').prop('disabled', 'disabled');
      $('#project-tab').addClass('active');
      $("#project-tab").removeAttr('disabled');
      $('#data-diri').removeClass('active');
      $('#data-diri').removeClass('show');
      $('#project').addClass('active');
      $('#project').addClass('show');
    }
  </script>

  <!-- button next data diri -->
  <script>
    function next_data_diri() {
      var id_kandidat = $("#id_kandidat").val();

      var nik = $("#nik_ktp").val();
      var nama = $("#nama_lengkap").val();
      var jenis_kelamin = $("#jenis_kelamin").val();
      var tempat_lahir = $("#tempat_lahir").val();
      var tanggal_lahir = $("#tanggal_lahir").val();
      var asal_kota = $("#asal_kota").val();
      var alamat_domisili = $("#alamat_domisili").val();
      var nomor_tlp = $("#no_hp").val();
      var nama_kontak_darurat = $("#nama_kondar").val();
      var hubungan_kontak_darurat = $("#hubungan_kondar").val();
      var nomor_tlp_kontak_darurat = $("#nomor_kondar").val();
      var status_nikah = $("#status_nikah").val();

      if (
        nik == "" || nik == "0" || nik == null ||
        nama == "" || nama == "0" || nama == null ||
        jenis_kelamin == "" || jenis_kelamin == "0" || jenis_kelamin == null ||
        tempat_lahir == "" || tempat_lahir == "0" || tempat_lahir == null ||
        tanggal_lahir == "" || tanggal_lahir == "0" || tanggal_lahir == null ||
        asal_kota == "" || asal_kota == "0" || asal_kota == null ||
        alamat_domisili == "" || alamat_domisili == "0" || alamat_domisili == null ||
        nomor_tlp == "" || nomor_tlp == "0" || nomor_tlp == null ||
        nama_kontak_darurat == "" || nama_kontak_darurat == "0" || nama_kontak_darurat == null ||
        hubungan_kontak_darurat == "" || hubungan_kontak_darurat == "0" || hubungan_kontak_darurat == null ||
        nomor_tlp_kontak_darurat == "" || nomor_tlp_kontak_darurat == "0" || nomor_tlp_kontak_darurat == null ||
        status_nikah == "" || status_nikah == "0" || status_nikah == null
      ) {
        alert("Semua input data diri harus diisi.");
      } else {
        // AJAX untuk save data diri
        $.ajax({
          url: '<?= base_url() ?>registrasi/save_data_diri/',
          method: 'post',
          data: {
            [csrfName]: csrfHash,
            id_kandidat: id_kandidat,

            nik: nik,
            nama: nama,
            jenis_kelamin: jenis_kelamin,
            tempat_lahir: tempat_lahir,
            tanggal_lahir: tanggal_lahir,
            asal_kota: asal_kota,
            alamat_domisili: alamat_domisili,
            nomor_tlp: nomor_tlp,
            nama_kontak_darurat: nama_kontak_darurat,
            hubungan_kontak_darurat: hubungan_kontak_darurat,
            nomor_tlp_kontak_darurat: nomor_tlp_kontak_darurat,
            status_nikah: status_nikah,
          },
          beforeSend: function() {},
          success: function(response) {
            $('#data-diri-tab').prop('disabled', 'disabled');
            $("#pengalaman-tab").removeAttr('disabled');

            $('#data-diri-tab').removeClass('active');
            $('#data-diri-tab').addClass('done');
            $('#pengalaman-tab').addClass('active');
            $('#data-diri').removeClass('active');
            $('#data-diri').removeClass('show');
            $('#pengalaman').addClass('active');
            $('#pengalaman').addClass('show');
          },
          error: function(xhr, status, error) {
            alert("error save data diri");
          }
        });
      }

    }
  </script>

  <!-- button previous pengalaman -->
  <script>
    function previous_pengalaman() {
      $('#pengalaman-tab').prop('disabled', 'disabled');
      $("#data-diri-tab").removeAttr('disabled');

      $('#pengalaman-tab').removeClass('active');
      $('#data-diri-tab').removeClass('done');
      $('#data-diri-tab').addClass('active');
      $('#pengalaman').removeClass('active');
      $('#pengalaman').removeClass('show');
      $('#data-diri').addClass('active');
      $('#data-diri').addClass('show');
    }
  </script>

  <!-- button next pengalaman -->
  <script>
    function next_pengalaman() {
      var id_kandidat = $("#id_kandidat").val();
      var pengalaman_kerja = $("#pengalaman_kerja").val();
      var kontak_person_sebelumnya = $("#kontak_person_sebelumnya").val();

      if (pengalaman_kerja == "" || pengalaman_kerja == null) {
        alert("Pengalaman kerja harus diisi");
      } else {
        // AJAX untuk save data diri
        $.ajax({
          url: '<?= base_url() ?>registrasi/save_pengalaman/',
          method: 'post',
          data: {
            [csrfName]: csrfHash,
            id_kandidat: id_kandidat,
            pengalaman_kerja: pengalaman_kerja,
            kontak_person_sebelumnya: kontak_person_sebelumnya,
          },
          beforeSend: function() {},
          success: function(response) {
            $('#pengalaman-tab').prop('disabled', 'disabled');
            $("#dokumen-tab").removeAttr('disabled');

            $('#pengalaman-tab').removeClass('active');
            $('#pengalaman-tab').addClass('done');
            $('#dokumen-tab').addClass('active');
            $('#pengalaman').removeClass('active');
            $('#pengalaman').removeClass('show');
            $('#dokumen').addClass('active');
            $('#dokumen').addClass('show');
          },
          error: function(xhr, status, error) {
            alert("error save pengalaman");
          }
        });
      }

    }
  </script>

  <!-- button previous dokumen -->
  <script>
    function previous_dokumen() {
      $('#dokumen-tab').prop('disabled', 'disabled');
      $("#pengalaman-tab").removeAttr('disabled');

      $('#dokumen-tab').removeClass('active');
      $('#pengalaman-tab').removeClass('done');
      $('#pengalaman-tab').addClass('active');
      $('#dokumen').removeClass('active');
      $('#dokumen').removeClass('show');
      $('#pengalaman').addClass('active');
      $('#pengalaman').addClass('show');
    }
  </script>

  <!-- button next dokumen -->
  <script>
    function next_dokumen() {
      var id_kandidat = $("#id_kandidat").val();
      var ktp = $("#status_file_ktp").val();
      var cv = $("#status_file_cv").val();
      var ijazah = $("#status_file_ijazah").val();

      if (ktp == "0" || cv == "0" || ijazah == "0") {
        alert("KTP, CV dan Ijazah harus diisi");
      } else {
        // AJAX untuk Finish isi
        $.ajax({
          url: '<?= base_url() ?>registrasi/finish_register/',
          method: 'post',
          data: {
            [csrfName]: csrfHash,
            id_kandidat: id_kandidat,
          },
          beforeSend: function() {},
          success: function(response) {
            var res = jQuery.parseJSON(response);

            $('#waktu_registrasi').html(res);
            $("#navigasi_section").attr("hidden", true);
            $('#dokumen-tab').removeClass('active');
            $('#dokumen-tab').addClass('done');
            $('#finish-tab').addClass('active');
            $('#dokumen').removeClass('active');
            $('#dokumen').removeClass('show');
            $('#finish').addClass('active');
            $('#finish').addClass('show');
          },
          error: function(xhr, status, error) {
            alert("error finish registrasi kandidat");
          }
        });
      }

    }
  </script>

  <!-- Event filepond-->
  <script>
    document.addEventListener('FilePond:processfiles', (e) => {
      // alert("selesai upload file");
      $('#button_next_dokumen').attr("hidden", false);
      // console.log('FilePond ready for use', e.detail);

      // // get create method reference
      // const { create } = e.detail;FilePond:processfilestart
    });

    document.addEventListener('FilePond:processfilestart', (e) => {
      // alert("mulai upload file");
      $('#button_next_dokumen').attr("hidden", true);
      // console.log('FilePond ready for use', e.detail);

      // // get create method reference
      // const { create } = e.detail;FilePond:addfilestart
    });

    document.addEventListener('FilePond:addfilestart', (e) => {
      // alert("mulai add file");
      $('#button_next_dokumen').attr("hidden", true);
      // console.log('FilePond ready for use', e.detail);

      // // get create method reference
      // const { create } = e.detail;FilePond:addfilestart 
    });

    pond_pasfoto.on('processfiles', (error, file) => {
      $('#status_file_pasfoto').val("1");
    });
    pond_ktp.on('processfiles', (error, file) => {
      $('#status_file_ktp').val("1");
    });
    pond_cv.on('processfiles', (error, file) => {
      $('#status_file_cv').val("1");
    });
    pond_ijazah.on('processfiles', (error, file) => {
      $('#status_file_ijazah').val("1");
    });
  </script>
</body>

<!-- Mirrored from themesbrand.com/velzon/html/master/job-landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2024 07:47:12 GMT -->

</html>